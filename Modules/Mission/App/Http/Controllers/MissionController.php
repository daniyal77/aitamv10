<?php

namespace Modules\Mission\App\Http\Controllers;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Mission\App\Services\MissionService;
use Modules\Vacation\App\Services\VacationService;

class MissionController extends Controller
{
    private MissionService $missionService;

    public function __construct(MissionService $missionService)
    {
        $this->missionService = $missionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $missions = $this->missionService->allMission();
            return view('mission::list', compact('missions'));
        } catch (Exception $e) {
            Log::error("mission day list : " . $e->getMessage() . "|" . $e->getLine());
            return redirect()->back()->with('err', 'خطایی رخ داده لطفا دوباره تلاش نمایید');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = $this->missionService->showEmployee();
        return view('mission::create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $this->missionService->createMission($request->all());
            return redirect()->route('mission.index')->with('suc', 'ماموریت با موفقیت ذخیره شد');
        } catch (Exception $e) {
            Log::error("mission day create : " . $e->getMessage() . "|" . $e->getLine());
            return redirect()->back()->with('err', 'در ثبت ماموریت خطایی رخ داده است');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $mission = $this->missionService->find(id: $id);;
            return view('mission::edit', compact('mission'));

        } catch (Exception $e) {
            Log::error("mission edit : " . $e->getMessage() . " line :" . $e->getLine());
            return redirect()->back()->with('err', 'خطایی رخ داده لطفا دوباره تلاش نمایید');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $this->missionService->updateMission(
                id:        $id,
                startDate: $request->start_date,
                endDate:   $request->end_date,
                intro:     $request->intro
            );
            return redirect()->route('mission.index')->with('suc', 'ماموریت با موفقیت ویرایش شد');
        } catch (Exception $e) {
            Log::error("mission update : " . $e->getMessage() . " line :" . $e->getLine());

            return redirect()->back()->with('err', 'خطایی رخ داده لطفا دوباره تلاش نمایید');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    function checked($missionId)
    {
        try {
            $this->missionService->update(data: ['status' => Status::PUBLISH], id: $missionId);
            (new MissionService())->removeCacheMission();
            return redirect()->back()->with('suc', 'با موفقیت تایید شد');
        } catch (Exception $e) {
            Log::error("mission published : " .$e->getMessage());
            return redirect()->back()->with('err', 'در تایید ماموریت خطایی وجود دارد لطفا دوباره تلاش کید');
        }
    }

    function unchecked($missionId)
    {
        try {
            $this->missionService->update(data: ['status' => Status::DRAFT], id: $missionId);
            (new MissionService())->removeCacheMission();
            return redirect()->back()->with('suc', 'ماموریت رد شد');
        } catch (Exception $e) {
            Log::error("mission draft : " .$e->getMessage());
            return redirect()->back()->with('err', 'در رد مرخصی ماموریت وجود دارد لطفا دوباره تلاش کید');
        }
    }
}
