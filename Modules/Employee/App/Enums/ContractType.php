<?php

namespace Modules\Employee\App\Enums;

use App\Enums\Enum;

class ContractType extends Enum
{
    const DAILY_WORKER = 'daily_worker';
    const TEMPORARY = 'temporary';
    const HUMAN = 'human';

    function translations(): array
    {
        return [
            self::DAILY_WORKER   => 'روز مزد',
            self::TEMPORARY    => 'موقت',
            self::HUMAN => 'مردمی',
        ];
    }
}
