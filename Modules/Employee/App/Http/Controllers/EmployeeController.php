<?php

namespace Modules\Employee\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function index()
    {
        return view('employee::list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataReconcilement= $this->employeeService->dataReconcilement();
        return view('employee::create', compact('dataReconcilement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
       dd($request->all());
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('employee::show');
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
        //
    }
}
