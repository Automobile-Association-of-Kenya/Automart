<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;

class contactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email'  => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $message = new Messages;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();

        return redirect(route('contact'))->with('successMsg', 'Message Send Successfully');
    }
}
