<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_otp;
use App\Models\User;
use Session;
use Hash;

class LoginController extends Controller
{
    public function index(){
        return view('frontend.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password'=>'required',
          ]);
        $password = $request->password;

        $user = User::where('email',$request->email)->first();
        if(isset($user)){
        $hashed_pass = $user->password;
        if (Hash::check($password, $hashed_pass)) {
            Session::put('user_id',$user->id);
            return response()->json(['status'=> 1,'success'=>'login successfully']);
         }
        else{
            return response()->json(['status'=> 2,'error'=>'Check Password !']);
        }
        }
        else{
            return response()->json(['status'=> 0,'error'=>'Please Check Email !']);
        }


    }



    public function logout(){
        // session()->flush();
        session()->forget('user_id');
        return redirect('/');
    }
}
