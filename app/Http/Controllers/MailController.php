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
            $mail_add  = Subscriber::where('email_id',$request->mail_address)->first();
            if(isset($mail_add)){
                return response()->json(['status'=>0, 'message'=>"already subscribe"]);
            }
            else{
                $sendMail =  Mail::to ($request->mail_address)->send(new MailNotify());
                if($sendMail){

                    $subscribe = Subscriber::create([
                        'email_id'=>$request->mail_address,
                        'status'=>1,
                    ]);

                    return response()->json(['status'=>1, 'message'=>"Mail send successfully"]);
                }
            }
    }
}
