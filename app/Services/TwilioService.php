<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;

    public function __construct()
    {
        try {
            $this->client = new Client(config('services.twilio.sid'), config('services.twilio.token'));
        } catch (\Exception $e) {
            // Log or handle the initialization error
            dd($e->getMessage());   
        }
    }

    public function sendWhatsAppMessage($to, $message)
    {
        dd(config('services.twilio.phone_number'));

        $this->client->messages->create(
            "whatsapp:{$to}",
            [
                'from' => "whatsapp:" . config('services.twilio.phone_number'),
                'body' => $message,
            ]
        );
    }
}
