<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //

    function upload(Request $req){
        $result=$req->file('file')->storeAs(public_path().'/images',$req->file->getClientOriginalName());
        return ["result"=>$result];
    }
}