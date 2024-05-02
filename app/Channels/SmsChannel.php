<?php

namespace App\Channels;

use App\Services\Sms\SmsNotification;
use Illuminate\Notifications\Notification;

/**
 * Class SmsChannel
 *این کلاس وظیفه ارسال نوتیفیکیشن پیامکی با استفاده از استراتژی  را بر عهده دارد.
 * This class is responsible for sending SMS notifications using the Kavenegar service.
 */
class SmsChannel
{
    /**
     * Send the given notification.
     * ارسال نوتیفیکیشن
     *
     * @param mixed        $notifiable
     * @param Notification $notification
     *
     * @return void
     */
    public function send(mixed $notifiable, Notification $notification): void
    {
        // Extract necessary data from the notification
        $data = $notification->toSms($notifiable);
        $message = $data['message'];
        $receptor = $data['number'];
        // Create an instance of SmsNotification with the strategy
        $smsNotification = new SmsNotification();
        // Send the SMS notification
        $smsNotification->send(number: $receptor, message: $message);
    }

}

