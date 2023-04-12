<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CarMake;
use App\Models\Caronsells;
use App\Models\County;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Support\Str;

class DealersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','store']);
    }

    public function index(){
        return view('dealerReg');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email'  => 'required',
            'number' => 'required',
            'number2' => 'optional',
            // 'county' => 'required',
            // 'dName' => 'required',
            'pass' => 'required|confirmed|min:8',
            'pass' => 'required|same:pass'
        ]);

        $user = User::where('email', $request->email)->first();
        $number = User::where('number', $request->number)->first();
        // $dName = User::where('dName', $request->dName)->first();
        if($user == true){
            return redirect(route('dealerreg'))->with('errorMsg', 'Email is already taken');
        }
        if($number == true){
            return redirect(route('dealerreg'))->with('errorMsg', 'Number is already taken');
        }
        // if($dName == true){
        //     return redirect(route('dealerreg'))->with('errorMsg', 'dName is already taken');
        // }
        $encpass = Hash::make($request->pass);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->number2 = $request->number2;
        // $user->county = $request->county;
        // $user->dName = $request->dName;
        $user->password = $encpass;
        $user->save();

        return redirect(route('login'))->with('successMsg', 'Car Dealer Registered Successfully. Login');
    }

    public function show(){
        $vehicles = Caronsells::where('email', Auth::user()->email) ->orderBy('created_at', 'desc')->paginate(9);
        $makes = CarMake::all();
        $counties = County::all();
        return view('dealer.addcar',compact('makes','vehicles', 'counties'));
    }
    public function addcar()
    {
        $counties = County::all();
        $makes = CarMake::orderBy('car_make_name','ASC')->get();
        $str_id = Str::random(8);
        return view('dealer.addcar',compact('makes','counties','str_id'));
    }
    public function editcar($id)
    {
        $vehicles = Caronsells::where('email', Auth::user()->email) ->orderBy('created_at', 'desc')->paginate(9);
        $makes = CarMake::orderBy('car_make_name','ASC')->get();
        $details = Caronsells::findOrFail($id);
        // return $details->images;
        // die();
       // dd($details);
        return view('dealer.editcar',compact('makes','vehicles','details'));
    }
    public function home()
    {
        $vehicles = Caronsells::where('email', Auth::user()->email) ->orderBy('created_at', 'desc')->paginate(9);
        $makes = CarMake::all();
        return view('dealer.home',compact('makes','vehicles'));
    }
    public function mycars()
    {
        $vehicles = Caronsells::where('email', Auth::user()->email) ->orderBy('created_at', 'desc')->paginate(9);
        $makes = CarMake::all();
        return view('dealer.mycars',compact('makes','vehicles'));
    }
    public function mysales()
    {
        $vehicles = Caronsells::where('email', Auth::user()->email) ->orderBy('created_at', 'desc')->paginate(9);
        $makes = CarMake::all();
        return view('dealer.mysales',compact('makes','vehicles'));
    }
    public function subscriptions()
    {
        $vehicles = Caronsells::where('email', Auth::user()->email) ->orderBy('created_at', 'desc')->paginate(9);
        $makes = CarMake::all();
        return view('dealer.subscriptions',compact('makes','vehicles'));
    }
}
