<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\CarMake;
use App\Models\Caronsells;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ApplicationController extends Controller
{

    public function welcome()
    {
        $vehicles = Caronsells::orderBy('id', 'desc')->paginate(6);
        $makes = CarMake::all();
        // $images = json_decode($vehicles[0]->images,true);
        // return $images[0];
        return view('index', compact('vehicles', 'makes'));
    }

    public function about()
    {
        return redirect()->back();
    }

    public function handleImages(Request $request)
    {
        $imageString = explode(',', $request->image);
        if (isset($request->cover_image) && $request->cover_image == true) {
            if (session()->has($request->str_id . 'cover')) {
                session()->forget($request->str_id . 'cover');
            }
            session()->put($request->str_id . 'cover', $imageString[1]);
        }else{
            if (session()->has(["$request->str_id"])) {
                session()->push("$request->str_id", $imageString[1]);
            } else {
                session()->put("$request->str_id", [$imageString[1]]);
            }
        }
        return 'success';
    }

    public function store(VehicleRequest $request)
    {
        $images = [];
        $strkey = $request->str_id;
        if (session()->has("$strkey")) {
            foreach (session("$strkey") as $key => $value) {
                $image = base64_decode($value);
                $fileName = 'img' . auth()->id() . $key . strtotime(now()) . '.jpg'; // or any other desired file name
                $img = Image::make($image);

                $img->text(' ' . $request->firstname . ' via AA Kenya', 150, 120, function ($font) {
                    $font->file(public_path('assets/fonts/font.ttf'));
                    $font->size(18);
                    $font->color('#CECECE');
                    $font->align('center');
                    $font->valign('center');
                    $font->angle(0);
                });

                $img->save(public_path('images/' . $fileName));
                array_push($images, $fileName);
            }
        }
        if (session()->has($strkey.'cover')) {
            $jsone = session($strkey.'cover');
            $image = base64_decode($jsone);
            $coverImage = 'img' . auth()->id() .'cover'. strtotime(now()) . '.jpg'; // or any other desired file name
            $img = Image::make($image);
            $img->text(' ' . $request->firstname . ' via AA Kenya', 150, 120, function ($font) {
                $font->file(public_path('assets/fonts/font.ttf'));
                $font->size(18);
                $font->color('#CECECE');
                $font->align('center');
                $font->valign('center');
                $font->angle(0);
            });
            $img->save(public_path('images/' . $coverImage));
        }

        $validated = $request->validated();
        $validated["features"] = json_encode(explode(',', $validated["features"]));
        Caronsells::create(['user_id' => auth()->id(), 'carId' => $strkey, 'cover_photo' => (isset($coverImage) ? $coverImage : $images[0]), 'images' => json_encode($images), 'views' => 0] + $validated);
        session()->forget("$strkey");

        return json_encode(['status' => 'success', 'message' => "Vehicle added successfully"]);
    }

    public function updateVehicle(VehicleRequest $request, $id)
    {
        $validated = $request->validated();
        $vehicle = Caronsells::findOrFail($id);
        $images = json_decode($vehicle->images);
        $images = (is_array($images)) ? $images : [];
        if (session()->has($id . "_vehicle_cover")) {
            $string = session($id . "_vehicle_cover");
            $image = base64_decode($string);
            $coverImage = 'img' . auth()->id() . "cover" . strtotime(now()) . '.jpg'; // or any other desired file name
            $img = Image::make($image);
            $img->text(' ' . $request->firstname . ' via AA Kenya', 150, 120, function ($font) {
                $font->file(public_path('assets/fonts/font.ttf'));
                $font->size(18);
                $font->color('#CECECE');
                $font->align('center');
                $font->valign('center');
                $font->angle(0);
            });
            $img->save(public_path('images/' . $coverImage));
            // $vehicle->cover_photo = $coverImage;
        }

        if (session()->has($id . "_vehicle_images")) {
            foreach (session($id . "_vehicle_images") as $key => $value) {
                $image = base64_decode($value);
                $fileName = 'img' . auth()->id() . $key . strtotime(now()) . '.jpg'; // or any other desired file name
                $img = Image::make($image);
                $img->text(' ' . $request->firstname.' via AA Kenya', 150, 120, function ($font) {
                    $font->file(public_path('assets/fonts/font.ttf'));
                    $font->size(18);
                    $font->color('#CECECE');
                    $font->align('center');
                    $font->valign('center');
                    $font->angle(0);
                });
                $img->save(public_path('images/' . $fileName));
                array_push($images, $fileName);
            }
        }

        $validated["features"] = json_encode(explode(',', $validated["features"]));
        $vehicle->update(['images' => json_encode($images), 'cover_photo'=>(isset($coverImage) ? $coverImage : $vehicle->cover_photo)] + $validated);
        session()->forget($id . "_vehicle_images");
        session()->forget($id . "_vehicle_cover");
        return json_encode(['status' => 'success', 'message' => "Vehicle updated successfully"]);
    }

    public function updateImages(Request $request)
    {
        $imageString = explode(',', $request->image);
        if (isset($request->cover_image) && $request->cover_image == true) {
            if (session()->has($request->vehicle_id . "_vehicle_cover")) {
                session()->forget($request->vehicle_id . "_vehicle_cover");
            }
            session()->put($request->vehicle_id . "_vehicle_cover", $imageString[1]);
        } else {
            if (session()->has($request->vehicle_id . "_vehicle_images")) {
                session()->push($request->vehicle_id . "_vehicle_images", $imageString[1]);
            } else {
                session()->put($request->vehicle_id . "_vehicle_images", [$imageString[1]]);
            }
        }
        return 'success';
    }

    public function trendingVehicles()
    {
        // $vehicles = Caronsells::inRandomOrder()->limit(50)->with(['model','make'=>])
        $vehicles = Caronsells::inRandomOrder()->limit(12)->where('cover_photo','!=', "")->with(['make' => function ($sql) {
            return $sql->select('car_make_id', 'car_make_name');
        }, 'model' => function ($sqs) {
            return $sqs->select('car_model_id', 'car_model_name');
        }])->orderBy('views', 'DESC')->get();
        return json_encode($vehicles);
    }
}
