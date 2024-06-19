<?php

namespace Modules\Vacation\App\Http\Controllers;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use Exception;
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
        try {
            $this->vacationService->createVacation($request->all());
            return redirect()->route('vacation.index')->with('suc', 'مرخصی باموفقیت ذخیره شد');
        } catch (Exception $e) {
            return redirect()->back()->with('err', 'در ثبت مرخصی خطایی رخ داده است');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $vacation = $this->vacationService->find(id: $id);;
            return view('vacation::edit', compact('vacation'));
        } catch (Exception $e) {
            return redirect()->back()->with('err', 'خطلایی رخ داده لطفا دوباره تلاش نمایید');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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

    function checked($vacationId)
    {
        try {
            $this->vacationService->update(data: ['status' => Status::PUBLISH], id: $vacationId);;
            return redirect()->back()->with('suc', 'با موفقیت تایید شد');
        } catch (Exception $e) {
            return redirect()->back()->with('err', 'در تایید مرخصی خطلایی وجود دارد لطفا دوباره تلاش کید');

        }
    }

    function unchecked($vacationId)
    {
        try {
            $this->vacationService->update(data: ['status' => Status::DRAFT], id: $vacationId);;
            return redirect()->back()->with('suc', 'مرخصی رد شد');
        } catch (Exception $e) {
            return redirect()->back()->with('err', 'در رد مرخصی خطلایی وجود دارد لطفا دوباره تلاش کید');

        }
    }
}
