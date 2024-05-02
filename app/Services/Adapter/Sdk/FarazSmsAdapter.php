<?php

namespace App\Services\Adapter\Sdk;

use App\Enums\Setting;
use IPPanel\Client;

class FarazSmsAdapter
{

    protected $client;

    public function __construct()
    {
        $this->client = new Client(Setting::get(Setting::SMS_KEY_FARAZ));
    }

    public function send(string $number, array $message, string $patternCode = '')
    {
        $this->client->sendPattern($patternCode, Setting::get(Setting::SMS_SENDER_FARAZ), $number, $message);
    }

    public function sendGroup(array $number, array $message, string $patternCode = '')
    {
        $this->client->sendPattern($patternCode, Setting::get(Setting::SMS_SENDER_FARAZ), $number, $message);
    }
}
