<?php

namespace App\Http\Controllers;

use App\Models\Caronsells;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Support\Facades\Auth;

class dealersController extends Controller
{
    public function __construct()
    {
        if (is_null(session('user'))) {
            redirect()->route('login');
        }
    }

    public function index(){
        return view('dealerReg');
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email'  => 'required',
            'number' => 'required',
            'number2' => 'required',
            'county' => 'required',
            'dName' => 'required',
            'pass' => 'required|confirmed|min:8',
            'pass' => 'required|same:pass'
        ]);
       
        $user = User::where('email', $request->email)->first();
        $number = User::where('number', $request->number)->first();
        $dName = User::where('dName', $request->dName)->first();
        if($user == true){
            return redirect(route('dealerreg'))->with('errorMsg', 'Email is already taken');
        }
        if($number == true){
            return redirect(route('dealerreg'))->with('errorMsg', 'Number is already taken');
        }
        if($dName == true){
            return redirect(route('dealerreg'))->with('errorMsg', 'dName is already taken');
        }
        $encpass = Hash::make($request->pass);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->number2 = $request->number2;
        $user->county = $request->county;
        $user->dName = $request->dName;
        $user->password = $encpass;
        $user->save();
        
        return redirect(route('login'))->with('successMsg', 'Car Dealer Registered Successfully. Login');
    }
    public function show(){
      
        return view('dealer');
    }
    
}
