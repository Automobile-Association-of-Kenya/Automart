<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //

    function upload(Request $req){
        $result=$req->file('image')->storeAs(public_path().'/images',$req->file('image')->getClientOriginalName());
        return ["result"=>$result];
    }
}