<?php

namespace App\Enums;

class Status extends Enum
{

    const  PENDING = 'pending';
    const  DRAFT = 'draft';
    const  PUBLISH = 'publish';

    function translations(): array
    {
        return [
            self::PENDING   => 'منتظر عملیات',
            self::DRAFT    => 'رد شده',
            self::PUBLISH => 'تایید شده',
        ];
    }

}
