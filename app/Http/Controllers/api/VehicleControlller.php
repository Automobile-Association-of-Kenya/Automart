<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\Caronsells;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class VehicleControlller extends Controller
{

    public function handleImages(Request $request)
    {
        $imageString = explode(',', $request->image);
        if (session()->has(["$request->str_id"])) {
            session()->push("$request->str_id", $imageString[1]);
        } else {
            session()->put("$request->str_id", [$imageString[1]]);
        }
        return json_encode(['status'=>"success"]);
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        $images = [];
        $strkey = $request->str_id;
        if (session()->has("$strkey")) {
            foreach (session("$strkey") as $key => $value) {
                $image = base64_decode($value);
                $fileName = 'img' . $request->user_id . $key . strtotime(now()) . '.jpg'; // or any other desired file name
                $img = Image::make($image);
                $img->save(public_path('images/' . $fileName));
                array_push($images, $fileName);
            }
        }

        $validated = $request->validated();
        $validated["features"] = json_encode($validated["features"]);
        Caronsells::create(['user_id' => $request->user_id, 'carId' => $strkey, 'cover_photo' => $images[0], 'images' => json_encode($images), 'views' => 0] + $validated);
        session()->forget("$strkey");

        return json_encode(['status' => 'success', 'message' => "Vehicle added successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
