<?php

namespace Modules\Employee\App\Enums;

use App\Enums\Enum;

class EndOfService extends Enum
{
    const YES = 'YES';
    const NO = 'NO';
    const WOMEN = 'WOMEN';

    function translations(): array
    {
        return [
            self::YES   => 'بلی',
            self::NO    => 'خیر',
            self::WOMEN => 'خانم',
        ];
    }
}
