<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Image;

class ImageController extends Controller
{

    public function resizeImage()
    {
        try {
                return response()->json([
                    'message'=>'we are here!'
                ]);
        } catch (\Throwable $th) {
            return response()->json([
                'errors'=>$th->getMessage()
            ]);
        }
    }
// public function resizeImagePost(Request $request)
//     {
//         try {
//             //code...
//             $this->validate($request, [
//                 'title' => 'required',
//                 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//             ]);

//             $image = $request->file('image');
//             $input['imagename'] = time().'.'.$image->extension();

//             $destinationPath = public_path('/thumbnail');
//             $img = Image::make($image->path());
//             $img->resize(100, 100, function ($constraint) {
//                 $constraint->aspectRatio();
//             })->save($destinationPath.'/'.$input['imagename']);

//             $destinationPath = public_path('/images');
//             $image->move($destinationPath, $input['imagename']);

//             return response()->json([
//                 'mesage'=>'image uploaded successfully',
//                 'data'=>$input['imagename']
//             ]);

//         } catch (\Throwable $th) {
//             //throw $th;
//             return response()->json([
//                 'errors'->$th->getMessage()
//             ]);
//         }

//     }
    public function store(Request $request)
    {
        if ($request->hasFile('profile_image')) {
            foreach($request->file('profile_image') as $file){
                //get filename with extension
                $filenamewithextension = $file->getClientOriginalName();
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                //get file extension
                $extension = $file->getClientOriginalExtension();
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
                Storage::put('public/profile_images/'. $filenametostore, fopen($file, 'r+'));
                Storage::put('public/profile_images/thumbnail/'. $filenametostore, fopen($file, 'r+'));
                //Resize image here
                $thumbnailpath = public_path('storage/profile_images/thumbnail/'.$filenametostore);
                $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($thumbnailpath);
            }

        return response()->json(['message'=>'uploaded']);//redirect('image')->with('success', "Image(s) uploaded successfully.");

        return response()->json([
            'data'=>$request->file('profile_image')
        ]);
        }
    }

}

