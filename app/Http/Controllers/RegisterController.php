<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class RegisterController extends Controller
{
    public function index(){
        return view('frontend.signup');
    }
    public function register(Request $request){
        // dd('test');
        $request->validate([
            'user_name' => 'required|max:30',
            'number'=>'required|max:10|min:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|regex:/^[a-zA-Z0-9!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]+$/|max:11|min:5',
        ]);
        $user = User::create([
            'name' => $request->user_name,
            'phone' => $request->number,
            'email' => $request->email,
            'password' => $request->password,
            'status'=>1
        ]);

        if($user){
            Session::put('user_id',$user->id);
            return response()->json(['status'=> 1, 'success'=>"data inserted successfully."]);
        }

    }

}
