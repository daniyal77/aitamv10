<?php

namespace App\Services\Adapter\Sdk;

class SmsIrAdapter
{
    protected $smsir;

    public function __construct()
    {
        //  $this->smsir = new Smsir($line_number, $api_key);
    }

    public function send(string $number, array $message)
    {
        //   $send = $this->smsir->Send();
    }

    public function sendGroup(array $number, array $message)
    {
        // $this->smsir->bulk($message, $mobiles, $send_at, $line_number);

    }
}
