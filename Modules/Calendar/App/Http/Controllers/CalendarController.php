<?php

namespace Modules\Calendar\App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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

//        $url = 'https://holidayapi.ir/jalali/1403/02/22';
//        $display = file_get_contents($url);
//        dd(json_decode($display));

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
}
