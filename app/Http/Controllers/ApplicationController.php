<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Caronsells;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function handleImages(Request $request)
    {
        $imageString = explode(',', $request->image);
        $image = base64_decode($imageString[1]);
        // $fileName = 'img' . auth()->id() . strtotime(now()) . '.jpg'; // or any other desired file name
        $img = Image::make($image);
        if (isset($_SESSION["$request->str_id"])) {
            array_push($_SESSION["$request->str_id"],$img);
        }else {
            $_SESSION["$request->str_id"] = [$img];
            // session($request->str_id,[]);
        }
        return 'success';
        // return session($request->str_id);
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
        if ($_SESSION["$strkey"]) {
            return "there";
            foreach ($_SESSION["$strkey"] as $key => $value) {
                $fileName = 'img' . auth()->id() .$key. strtotime(now()) . '.jpg'; // or any other desired file name
                $value->save(public_path('images/' . $fileName));
                array_push($images,$fileName);
            }
        }
        return "here";
        $validated = $request->validated();
        $validated["features"] = json_encode($validated["features"]);
        $vehicle = Caronsells::create(['user_id'=>auth()->id,'images'=>json_encode($images)]+$validated);
        return json_encode(['status'=>'success', 'message'=>"Vehicle added successfully"]);
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
