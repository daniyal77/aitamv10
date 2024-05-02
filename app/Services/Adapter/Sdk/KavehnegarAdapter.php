<?php

namespace App\Services\Adapter\Sdk;

use App\Enums\Setting;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Kavenegar\KavenegarApi;

class KavehnegarAdapter
{
    protected $sender, $api;

    public function __construct()
    {
        $this->sender = Setting::get(Setting::SMS_SENDER_KAVEHNEGAR);
        $this->api = new KavenegarApi(Setting::get(Setting::SMS_KEY_KAVEHNEGAR));
    }

    public function send(string $number, array $message, string $patternCode = '')
    {
        try {
            return $this->api->Send($this->sender, $number, $message);
        } catch (ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            echo $e->errorMessage();
        } catch (HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            echo $e->errorMessage();
        }
    }

    public function sendGroup(array $number, array $message, string $patternCode = '')
    {
        try {
            return $this->api->Send($this->sender, $number, $message);
        } catch (ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            echo $e->errorMessage();
        } catch (HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            echo $e->errorMessage();
        }
    }
}
