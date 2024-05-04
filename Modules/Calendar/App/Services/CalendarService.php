<?php

namespace Modules\Calendar\App\Services;

use App\Services\Models\ServiceModel;
use Illuminate\Support\Facades\Cache;
use Modules\Calendar\App\Models\Calendar;
use Modules\Calendar\App\Services\traits\Calendar\CalendarCache;
use Modules\Calendar\App\Services\traits\Calendar\CalendarFields;
use Modules\Calendar\App\Services\traits\Calendar\CalendarRelational;

class CalendarService extends ServiceModel
{
    use CalendarRelational, CalendarFields, CalendarCache;

    function modelClass(): Calendar
    {
        return new Calendar();
    }

    public function showEventInUserOrRoleId($userId, $roleId)
    {
        return Cache::remember('caldeners' . $userId, env('CASH_EXPIRE'), function () use ($userId, $roleId) {
            return $this->modelClass()->where('user_id', $userId)
                ->orWhere('role_id', $roleId)
                ->get()
                ->map
                ->only('event', 'date');
        });
    }

    public function addEventInUserOrRoleId($userId, $roleId, $start_date, $desc)
    {
        $this->create([
            'date'    => $start_date,
            'event'   => $desc,
            'user_id' => $userId,
            'role_id' => $roleId,
        ]);
    }
}
