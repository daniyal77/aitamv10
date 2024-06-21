<?php

namespace Modules\Calendar\App\Services;

use App\Services\Models\ServiceModel;
use Carbon\CarbonPeriod;
use GuzzleHttp\Client;
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
        return Cache::remember($this->CacheCalendarList(), 360,
            function () use ($userId, $roleId) {
                return $this->modelClass()->where('user_id', $userId)
                    ->orWhere('role_id', $roleId)
                    ->get()
                    ->map
                    ->only('event', 'date');
            });
    }

    public function addEventInUserOrRoleId($userId, $roleId, $start_date, $desc): void
    {
        $this->create([
            'date'    => $start_date,
            'event'   => $desc,
            'user_id' => $userId,
            'role_id' => $roleId,
        ]);
    }


    public function saveHolidayFromApi()
    {

        $startOfYear = verta()->startYear()->toCarbon();
        $endOfYear = verta()->endYear()->toCarbon();
        $period = CarbonPeriod::create($startOfYear, $endOfYear);
        $p = array();
        foreach ($period as $date) {
            $p[] = $date->format('Y-m-d');
        }
        $client = new Client();
        foreach ($p as $day) {

            $response = $client->get('https://holidayapi.ir/gregorian/' . str_replace('-', '/', $day));

            if ($response->getStatusCode() == 200) {
                $data = json_decode($response->getBody(), true);
                if ($data['is_holiday']) {

                }
            } else {
                echo "Failed to get data from API";
            }
        }

    }
}
