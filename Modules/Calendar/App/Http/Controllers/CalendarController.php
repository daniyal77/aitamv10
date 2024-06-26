<?php

namespace Modules\Calendar\App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Modules\Calendar\App\Jobs\DeleteEventAfterTwoYearJob;
use Modules\Calendar\App\Jobs\getHolidayJob;
use Modules\Calendar\App\Services\CalendarService;

class CalendarController extends Controller
{

    protected CalendarService $calendarService;

    public function __construct(CalendarService $calendarService)
    {
        $this->calendarService = $calendarService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        //todo refactor when auth
//        $userId = Auth::user()->RoleId;
        $userId = 0;
        $roleId = 0;
        $calendars = $this->calendarService->showEventInUserOrRoleId(userId: $userId, roleId: $roleId);
        return view('calendar::list', compact('calendars'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return bool
     */
    public function store(Request $request): bool
    {
        //todo رول رو فقط ادمین میتونه ثبت کنه
        $userId = 0;
        $roleId = 0;
        $this->calendarService->addEventInUserOrRoleId(
            userId    : $userId,
            roleId    : $roleId,
            start_date: $request->start_date,
            desc      : $request->desc
        );
        return true;
    }

    public function destroy(Request $request): bool
    {
        try {
            $this->calendarService->deleteEvent($request->id);
            return true;
        } catch (Exception $e) {
            Log::error("delete event calendar : " . $e->getMessage());
            return false;
        }
    }

    /**
     * گرفتن رویداد های تاریخ
     * @return void
     */
    public function api(): void
    {
        dispatch(new getHolidayJob())->onQueue('holiday');
    }

    /**
     * پاک کردن event هایی که دوسال ازشون گزشته
     * @return void
     */
    public function deleteAfterTwoYear(): void
    {
        dispatch(new DeleteEventAfterTwoYearJob())->onQueue('event-delete-after-two-year');
    }
}
