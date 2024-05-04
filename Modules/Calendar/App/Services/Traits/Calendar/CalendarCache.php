<?php

namespace Modules\Calendar\App\Services\Traits\Calendar;


use Illuminate\Support\Facades\Cache;

trait CalendarCache
{

    public function CacheCalendarList()
    {
        //todo refactor when auth
        //Auth::user()->RoleId
        $userId = 0;
        return 'calendars' . $userId;
    }

    public function removeCacheCalendarList()
    {
        Cache::forget($this->CacheCalendarList());
    }
}

