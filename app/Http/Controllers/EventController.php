<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email_Massage;
use App\Services\TwilioService;

class EventController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    public function sendWhatsApp()
    {
        $to = '+8619186353';
        $message = 'Hello, this is a WhatsApp message from Laravel using Twilio!';

        $this->twilioService->sendWhatsAppMessage($to, $message);
        return 'WhatsApp message sent!';
    }

    public function sendMail(){
        return view('admin.events.sendMail');
    }
    public function addMail(Request $request){
        $email = Email_Massage::create([
            'email_message' => $request->massage,
            'status' => 1,
        ]);
        return redirect()->back();
    }
    public function sendmsg(){

    }
}
