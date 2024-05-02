<?php

namespace App\Services\Sms;

use App\Enums\Setting;
use App\Services\Adapter\Sdk\FarazSmsAdapter;

class SmsNotification
{
    private $strategy;

    public function __construct()
    {

        try {
            $typeActiveSendSms = Setting::get(Setting::SMS_ADAPTER_ACTIVE);
            $className = "App\Services\Sms\Providers\\" . ucfirst(strtolower($typeActiveSendSms));
            $this->strategy = new $className();
        } catch (\Throwable $e) {
            $this->strategy = new FarazSmsAdapter();
        }
    }

    /**
     * @param string $number
     * @param array $message
     * @param string $patternCode
     * @return void
     */
    public function send(string $number, array $message, string $patternCode = ''): void
    {
        $this->strategy->send($number, $message, $patternCode);
    }

    /**
     * @param array $number
     * @param array $message
     * @param string $patternCode
     * @return void
     */
    public function sendGroup(array $number, array $message, string $patternCode = ''): void
    {
        $this->strategy->sendGroup($number, $message, $patternCode);
    }
}
