<?php

namespace Modules\Employee\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function index()
    {
        $employeeRequest = $this->employeeRequestService->paginate();
        return view('employee::request.list', compact('employeeRequest'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee::create');
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
