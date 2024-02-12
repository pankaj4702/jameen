<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;

class ProfileController extends Controller
{
    public function index(){
        $cities = City::all();
        $userId = session('user_id');
        $user_a = User::find($userId);

        if(isset($user_a->city)||isset($user_a->dob)){
        $user = User::join('cities', 'users.city', 'cities.id')->where('users.id', $userId)->first(['users.id','cities.name as city_name','users.name','city','phone','dob','email']);

        return view('frontend.profile',compact('user','cities'));
        }
        else{
            $user = User::find($userId);
            return view('frontend.profile',compact('user','cities'));
        }
    }

    public function update_profile(Request $request){
        $request->validate([
            'phone'=>'required|min:10',
            'user_name'=>'required|min:4|max:25',
        ]);

        $user = User::find($request->user_id);
        if ($user) {
            // Update the user attributes
            $user->update([
                'name' => $request->user_name,
                'email'=> $user->email,
                'phone' => $request->phone,
                'city' => $request->city,
                'dob' => $user->dob == null ? $request->dob : $user->dob,
            ]);
            // The user has been updated
            return response()->json(['status'=>1,'message' => 'User updated successfully']);
        } else {
            // User not found
            return response()->json(['message' => 'User not found'], 404);
        }

    }
}
