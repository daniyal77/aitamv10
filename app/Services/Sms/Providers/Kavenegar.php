<?php

namespace App\Services\Sms\Providers;

use App\Services\Adapter\Sdk\FarazSmsAdapter;
use App\Services\Adapter\Sdk\KavehnegarAdapter;
use App\Services\Sms\SmsStrategyInterface;

class Kavenegar implements SmsStrategyInterface
{

    /**
     * @param string $number
     * @param array $message
     * @param string $patternCode
     */
    public function send(string $number, array $message, string $patternCode): void
    {
        (new KavehnegarAdapter())->send($number, $message, $patternCode);
    }

    /**
     * @param array $number
     * @param array $message
     * @param string $patternCode
     */
    public function sendGroup(array $number, array $message, string $patternCode): void
    {
        (new KavehnegarAdapter())->sendGroup($number, $message, $patternCode);
    }

}
