<?php

namespace Modules\Vacation\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Vacation\App\Services\VacationService;

class VacationController extends Controller
{
    //todo نصب دیباگبار
    //todo استفاده از رابطه
    //todo استفاده از کش
    //todo برای همه ماژول ها به کار ببر
    private VacationService $vacationService;

    public function __construct(VacationService $vacationService)
    {
        $this->vacationService = $vacationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $vacations = $this->vacationService->all();
        return view('vacation::list', compact('vacations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = $this->vacationService->showEmployee();
        return view('vacation::create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->vacationService->createVacation($request->all());
        return redirect()->route('vacation.index')->with('suc', 'مرخصی باموفقیت ذخیره شد');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('vacation::edit');
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
