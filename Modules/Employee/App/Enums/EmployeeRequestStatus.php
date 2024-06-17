<?php

namespace Modules\Employee\App\Enums;

use App\Enums\Enum;

class EmployeeRequestStatus extends Enum
{
    const ACCEPTED = 'ACCEPTED';
    const REJECT = 'REJECT';
    const PENDING = 'PENDING';

    function translations(): array
    {
        return [
            self::ACCEPTED => 'قبول',
            self::REJECT   => 'رد',
            self::PENDING  => 'درحال بررسی',
        ];
    }
}
