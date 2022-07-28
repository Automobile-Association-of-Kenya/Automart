<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Passwords\PasswordBroker;

class buyerController extends Controller
{
    public function index(){
        return view('login');
    }
    public function show_reg(){
        return view('buyerReg');
    }
    public function user1(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email'  => 'required',
            'password' => 'required|confirmed|min:8',
            'password' => 'required|same:password',
        ]);
        // if($request->password != $request->password2){
        //     return redirect(route('userreg'))->with('errorMsg', 'Passwords Do Not Match. Try Again!'); 
        // }
        $user = User::where('email', $request->email)->first();
        if($user == true){
            return redirect(route('userreg'))->with('errorMsg', 'User Already exist.'); 
        }else{
            $encpass = Hash::make($request->password);
            $buyer = new User;
            $buyer->name = $request->name;
            $buyer->email = $request->email;
            $buyer->password = $encpass;
            $buyer->save();
            
            return redirect(route('login'))->with('successMsg', 'Buyer Registered Successfully. Login');

        }

    }
    public function login(Request $request){
        $this->validate($request, [
            'email'  => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if($user == true){
            if(Hash::check($request->password, $user->password)){
                // check usertype and redirect
                if($user->dName == ''){
                    return view('buyer',compact('user'));
                }else{
                    return view('dealer',compact('user'));
                }
            }else{
                return redirect(route('login'))->with('errorMsg', 'Password is Incorrect. Try Again');  
            }
        }else{
            return redirect(route('login'))->with('errorMsg', 'User does not exist.');
        }
    }
    public function show(){
        return view('buyer');
    }
}
