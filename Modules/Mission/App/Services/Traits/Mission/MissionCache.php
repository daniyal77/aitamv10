<?php

namespace Modules\Mission\App\Services\Traits\Mission;

use Illuminate\Support\Facades\Cache;

trait MissionCache
{
    function cacheMission(): string
    {
        return "cacheMission";
    }

    function removeCacheMission(): void
    {
        Cache::forget($this->cacheMission());
    }
}

