<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\Caronsells;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    /**
     * @urlencoded image, @unique 10 character string
     */
    public function uploadImages(Request $request)
    {
        $imageString = explode(',', $request->image);
        if (isset($request->cover_image) && $request->cover_image == true) {
            if (session()->has($request->str_id . 'cover')) {
                session()->forget($request->str_id . 'cover');
            }
            session()->put($request->str_id . 'cover', $imageString[1]);
        } else {
            if (session()->has(["$request->str_id"])) {
                session()->push("$request->str_id", $imageString[1]);
            } else {
                session()->put("$request->str_id", [$imageString[1]]);
            }
        }
        return json_encode(['status' => "success", "message" => 'Photo added successfully. Please fill the form and submit']);
    }

    /**
     * @request containing @str_id used above
     */
    public function store(VehicleRequest $request)
    {
        $images = [];
        $strkey = $request->str_id;
        if (session()->has("$strkey")) {
            foreach (session("$strkey") as $key => $value) {
                $image = base64_decode($value);
                $fileName = 'img' . Str::random(3) . $key . strtotime(now()) . '.jpg'; // or any other desired file name
                $img = Image::make($image);

                $img->text(' ' . $request->firstname . ' ' . $request->lastname, 150, 120, function ($font) {
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
        if (session()->has($strkey . 'cover')) {
            $jsone = session($strkey . 'cover');
            $image = base64_decode($jsone);
            $coverImage = 'img' . Str::random(3) . 'cover' . strtotime(now()) . '.jpg'; // or any other desired file name
            $img = Image::make($image);
            $img->text(' ' . $request->firstname . ' ' . $request->lastname, 150, 120, function ($font) {
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

    /**
     *
     * @request, $id is vehicle_id
     */
    public function update(VehicleRequest $request, $id)
    {
        $validated = $request->validated();
        $vehicle = Caronsells::findOrFail($id);
        $images = json_decode($vehicle->images);
        if (session()->has($id . "_vehicle_cover")) {
            $string = session($id . "_vehicle_cover");
            $image = base64_decode($string);
            $coverImage = 'img' . Str::random(3) . "cover" . strtotime(now()) . '.jpg'; // or any other desired file name
            $img = Image::make($image);
            $img->text(' ' . $request->firstname . ' ' . $request->lastname, 150, 120, function ($font) {
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
                $fileName = 'img' . Str::random(3) . $key . strtotime(now()) . '.jpg'; // or any other desired file name
                $img = Image::make($image);
                $img->text(' ' . $request->firstname . ' ' . $request->lastname, 150, 120, function ($font) {
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
        $vehicle->update(['images' => json_encode($images), 'cover_photo' => (isset($coverImage) ? $coverImage : $vehicle->cover_photo)] + $validated);
        session()->forget($id . "_vehicle_images");
        session()->forget($id . "_vehicle_cover");
        return json_encode(['status' => 'success', 'message' => "Vehicle updated successfully"]);
    }

    /**
     * @urlencoded image, $vehicle_id
     */
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
        return json_encode(['status'=> "success", "message"=>'Photo added successfully. Please fill the form and submit']);
    }

}
