<?php

namespace Modules\Employee\App\Http\Controllers;

use App\Enums\Setting;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Employee\App\Services\EmployeeRequestService;

class EmployeeRequestController extends Controller
{

    private EmployeeRequestService $employeeRequestService;

    public function __construct(EmployeeRequestService $employeeRequestService)
    {
        $this->employeeRequestService = $employeeRequestService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $employeeRequest = $this->employeeRequestService->paginate();
        return view('employee::request.list', compact('employeeRequest'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $skills = explode(',', Setting::get(Setting::SKILS, []));

        return view('employee::request.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $this->employeeRequestService->createEmployee(
                name       : $request->name,
                last_name  : $request->last_name,
                skils      : $request->skils,
                file_resume: $request->file('file_resume')
            );
            return redirect()->route('employee.request.index')->with('suc', 'درخواست کارمند جدید باموفقیت ذخیره شد');
        } catch (Exception $e) {
            Log::error($e->getMessage() . " :: " . $e->getLine());
            return redirect()->route('employee.request.index')->with('err', 'خطلا در ثبت اطلاعات');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('employee::edit');
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
        //موقع حذف فایل رزومه هم پاک شود
    }
}
