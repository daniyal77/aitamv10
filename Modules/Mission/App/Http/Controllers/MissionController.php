<?php

namespace Modules\Mission\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Mission\App\Services\MissionService;

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
            return redirect()->back()->with('err', 'خطلایی رخ داده لطفا دوباره تلاش نمایید');
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
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('mission::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('mission::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
