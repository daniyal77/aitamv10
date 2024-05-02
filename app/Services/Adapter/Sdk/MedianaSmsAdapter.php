<?php

namespace App\Services\Adapter\Sdk;

use App\Enums\Setting;
use Medianasms\Client;

class MedianaSmsAdapter
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(Setting::get(Setting::SMS_KEY_MEDIANA_SMS));
    }

    public function send(string $number, array $message, string $patternCode = '')
    {
        $this->client->sendPattern($patternCode, Setting::get(Setting::SMS_SENDER_MEDIANA_SMS), $number, $message);
    }

    public function sendGroup(array $number, array $message, string $patternCode = '')
    {
        $this->client->sendPattern($patternCode, Setting::get(Setting::SMS_SENDER_MEDIANA_SMS), $number, $message);
    }
}
