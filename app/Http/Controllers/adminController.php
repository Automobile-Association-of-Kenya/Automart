<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Payment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Passwords\PasswordBroker;

class adminController extends Controller
{
    public function index(){
        return view('adminDash');
    }
    public function reg($id){
        $admin = Admin::where('id', $id)->first();
        return view('adm', compact('admin'));
    }
    public function addPay($id){
        $admin = Admin::where('id', $id)->first();
        return view('addPayment', compact('admin'));
    }
    public function package($id){
        $admin = Admin::where('id', $id)->first();
        $packs = Payment::all();
        return view('packages')->with(['packs' => $packs, 'admin' => $admin]);
    }
    public function admins($id){
        $admin = Admin::where('id', $id)->first();
        $all = Admin::all();
        return view('admins')->with(['admins' => $all, 'admin' => $admin]);
    }
    public function destroy($id, $adm){
        $del = Payment::where('id', $id)->delete();
        if($del == true){
            $message = 'Package Deleted Successfully';
            return redirect(route('packages', $adm))->with(['successMsg'=> $message]);
        }else{
            $message = 'Package Delete Failed. Try Again';
            return redirect(route('packages', $adm))->with(['errorMsg'=> $message]);
        }
    }
    public function edit_view($id, $adm){
        $pay = Payment::where('id', $id)->first();
        $admin = Admin::where('id', $adm)->first();
        return view('edit_pay')->with(['pay' => $pay, 'admin' => $admin]);
    }
    public function rm_admin($id, $adm){
        if($id == $adm){
            $message = 'You Cannot Delete Your Account';
            return redirect(route('admins1', $adm))->with(['errorMsg'=> $message]);  
        }
        $del = Admin::where('id', $id)->delete();
        if($del == true){
            $message = 'Admin Deleted Successfully';
            return redirect(route('admins1', $adm))->with(['successMsg'=> $message]);
        }else{
            $message = 'Package Delete Failed. Try Again';
            return redirect(route('admins1', $adm))->with(['errorMsg'=> $message]);
        }
    }
    public function save($id, Request $request){
        $this->validate($request, [
            'name' => 'required|unique:payments',
            'amount' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'posted_by' => 'null'
        ]);

        $poste = Admin::where('id', $id)->first();

        $payment = new Payment;
        $payment->name = $request->name;
        $payment->amount = $request->amount;
        $payment->description = $request->description;
        $payment->duration = $request->duration;
        $payment->posted_by = $poste->uName;
        $payment->save();

        $admin = Admin::where('id', $id)->first();
        $message = 'Package added Successfully';
        return redirect(route('packages', $id))->with(['admin' => $admin, 'successMsg'=> $message]);
    }
    public function store($id, Request $request){
        $this->validate($request, [
            'email'  => 'required|unique:admins',
            'uName' => 'required|unique:admins',
            'pass' => 'required|confirmed|min:8',
            'pass' => 'required|same:pass'
        ]);
       
        $encpass = Hash::make($request->pass);
        $user = new Admin;
        $user->email = $request->email;
        $user->uName = $request->uName;
        $user->password = $encpass;
        $user->save();
        
        return redirect(route('admins1', $id))->with('successMsg', 'Admin Registered Successfully');
        
    }

    public function update($id, $adm, Request $request){
        $this->validate($request, [
            'name' => 'required|unique:payments',
            'amount' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'posted_by' => 'null'
        ]);

        $poste = Admin::where('id', $id)->first();
        
        $update = Payment::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'amount' => $request->amount,
                    'description' => $request->description,
                    'duration' => $request->duration,
                    'posted_by' => $poste->uName
                ]);
        if($update == true){
            $message = 'Package Updated Successfully';
            return redirect(route('packages', $adm))->with(['successMsg'=> $message]); 
        }else{
            $message = 'Package Update Failed. Try Again';
            return redirect(route('packages', $adm))->with(['errorMsg'=> $message]);
        }        
    }

    public function log(Request $request){
        $this->validate($request, [
            'email'  => 'required',
            'password' => 'required',
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if($admin == true){
            if(Hash::check($request->password, $admin->password)){
                // check usertype and redirect
                return view('admin', compact('admin'));
            }else{
                return redirect(route('admin'))->with('errorMsg', 'Password is incorrect. Try Again.'); 
            }
        }else{
            return redirect(route('admin'))->with('errorMsg', 'User does not exist.');
        }
    }
}
