<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;
use App\Models\{Subscriber};
use Session;


class MailController extends Controller
{
    public function index(Request $request){
        // $mail_data = Subscriber::where('email_address',$request->mail_address)->first();

        // if(!isset($mail_data)){

            $sendMail =  Mail::to ($request->mail_address)->send(new MailNotify());
            dd($sendMail);
            if($sendMail){

                $subscribe = Subscriber::create([
                    'email_address'=>$request->mail_address,
                ]);
                return response()->json(['status'=>1, 'message'=>"Mail send successfully"]);
            }

    // }
    //     else{

    //         return response()->json(['status'=>3, 'message'=>"This User Already Subscriber"]);
    //      }

    }

}
