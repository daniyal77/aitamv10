<?php

namespace Modules\Calendar\App\Services;

use App\Services\Models\ServiceModel;
use Carbon\CarbonPeriod;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
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
//        return Cache::remember($this->CacheCalendarList(), 360,
//            function () use ($userId, $roleId) {
        return $this->modelClass()
                    ->where('user_id', $userId)
                    ->orWhere('role_id', $roleId)
            ->orWhere('is_holiday', true)
                    ->get()
                    ->map
            ->only('event', 'date', 'id');
//          /  });
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

    /**
     * گرفتن رویداد های تاریخ
     * @return void
     * @throws GuzzleException
     */
    public function saveHolidayFromApi(): void
    {

        $startOfYear = verta()->toCarbon();
        $endOfYear = verta()->endYear()->toCarbon();
        $period = CarbonPeriod::create($startOfYear, $endOfYear);
        $days = array();
        foreach ($period as $date) {
            $days[] = $date->format('Y-m-d');
        }
        $client = new Client();
        foreach ($days as $day) {

            $response = $client->get('https://holidayapi.ir/gregorian/' . str_replace('-', '/', $day));

            if ($response->getStatusCode() == 200) {
                $data = json_decode($response->getBody(), true);
                if ($data['is_holiday']) {
                    $message = $data['events'][0]['description'];
                    foreach ($data['events'] as $event) {
                        if ($event['is_religious'])
                            $message = $event['description'];

                    }
                    $this->create(
                        [
                            'date'       => $day,
                            'event' => $message,
                            'is_holiday' => 1,
                            'user_id'    => 0,
                            'role_id'    => 0
                        ]
                    );
                }
            } else
                Log::info("Failed to get data from API For Holiday");

        }
    }

    /**
     * پاک کردن event هایی که دوسال ازشون گزشته
     * @return void
     */
    public function deleteAfterTwoYear(): void
    {
        $this->modelClass()->whereDate('date', '<=', now()->subYear(2))->forceDelete();
    }


    public function deleteEvent($eventId,)
    {
        $userId = 0;
        $event = $this->find($eventId, true);
        if (!$event->isHoliday() && $event->getUserId() == $userId) {
            $this->deleteWithModel();
        }
    }
}
