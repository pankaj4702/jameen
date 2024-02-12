<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendFestivalGreetingsJob;
use App\Models\User;

class FestivalGreetingController extends Controller
{
    public function sendGreetings()
    {
        $users = User::all();
        User::chunk(200, function ($users) {
            foreach ($users as $user) {
                $data = ['email' => $user->email];
                $abc = SendFestivalGreetingsJob::dispatch($data);
            }
        });


        return response()->json(['message' => 'Festival greetings job dispatched successfully']);
    }
}
