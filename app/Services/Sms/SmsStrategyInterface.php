<?php

namespace App\Services\Sms;

interface SmsStrategyInterface
{
    public function send(string $number, array $message, string $patternCode);

    public function sendGroup(array $number, array $message, string $patternCode);

}
