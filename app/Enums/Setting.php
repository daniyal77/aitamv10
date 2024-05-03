<?php

namespace App\Enums;

class Setting extends Enum
{

    const  SMS_ADAPTER_ACTIVE = 'SMS_ADAPTER_ACTIVE';

    const  SMS_SENDER_FARAZ = 'SMS_SENDER_FARAZ';
    const  SMS_KEY_FARAZ = 'SMS_KEY_FARAZ';


    const  SMS_KEY_MEDIANA_SMS = 'SMS_KEY_MEDIANA_SMS';
    const  SMS_SENDER_MEDIANA_SMS = 'SMS_SENDER_MEDIANA_SMS';

    const  SMS_SENDER_KAVEHNEGAR = 'SMS_SENDER_KAVEHNEGAR';
    const  SMS_KEY_KAVEHNEGAR = 'SMS_KEY_KAVEHNEGAR';

    const  SMS_MELI_PAYAMAK_USER_NAME = 'SMS_MELI_PAYAMAK_USER_NAME';
    const  SMS_MELI_PAYAMAK_PASSWORD = 'SMS_MELI_PAYAMAK_PASSWORD';

    static function get($type, $default = '')
    {
        return \Setting::get($type, $default);
    }

}
