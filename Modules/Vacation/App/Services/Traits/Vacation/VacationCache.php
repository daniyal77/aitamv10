<?php

namespace Modules\Vacation\App\Services\Traits\Vacation;


use Illuminate\Support\Facades\Cache;

trait VacationCache
{

    function cacheVacation(): string
    {
        return "cacheVacation";
    }

    function removeCacheVacation()
    {
        Cache::forget($this->cacheVacation());
    }
}

