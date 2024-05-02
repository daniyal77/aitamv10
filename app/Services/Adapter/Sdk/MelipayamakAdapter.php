<?php

namespace App\Services\Adapter\Sdk;

use App\Enums\Setting;
use Melipayamak\MelipayamakApi;

class MelipayamakAdapter
{
    protected $SmsApi;

    public function __construct()
    {
        $this->SmsApi = new MelipayamakApi(
            username: Setting::get(Setting::SMS_MELI_PAYAMAK_USER_NAME),
            password: Setting::get(Setting::SMS_MELI_PAYAMAK_PASSWORD)
        );
    }

    public function send(string $number, array $message, string $pattern)
    {
        $this->SmsApi->sendByBaseNumber($message, $number, $pattern);

    }

    public function sendGroup(array $number, array $message, string $pattern)
    {
        $this->SmsApi->sendByBaseNumber($message, $number, $pattern);

    }
}
