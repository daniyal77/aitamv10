<?php

namespace Modules\Employee\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Employee\App\Enums\ContractType;
use Modules\Employee\App\Enums\EndOfService;
use Modules\Employee\App\Http\Requests\EmployeeRequest;
use Modules\Employee\App\Services\EmployeeService;

class EmployeeController extends Controller
{

    private EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $employees = $this->employeeService->paginate();
        return view('employee::list', compact('employees'));
    }

    /**
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function trash(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $employees = $this->employeeService->trash();
        return view('employee::list', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $dataReconcilement = $this->employeeService->dataReconcilement();
        return view('employee::create', compact('dataReconcilement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        $this->employeeService->createEmployee($request->all());
        return redirect()->route('employee.index')->with('suc', 'کارمند جدید باموفقیت ذخیره شد');
    }

    /**
     * Show the specified resource.
     */
    public function show($id): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $employee = $this->employeeService->find($id, true)->model;
        $contract_type = ContractType::getLabel($employee->contract_type);
        $end_of_service = EndOfService::getLabel($employee->the_end_of_service);
        return view('employee::show', compact('employee', 'contract_type','end_of_service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): Factory|\Illuminate\Foundation\Application|View|Application
    {

        $employee = $this->employeeService->find($id, true)->model;
        $contract_type = ContractType::getLabel($employee->contract_type);
        return view('employee::edit', compact('employee', 'contract_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->employeeService->updateEmployee($request->except('user_id'), $id);
        return redirect()->route('employee.index')->with('suc', 'کارمند با موفقیت اپدیت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $this->employeeService->delete($id);
        return response()->json(['suc', 'کارمند با موفقیت اپدیت شد']);
    }
}
