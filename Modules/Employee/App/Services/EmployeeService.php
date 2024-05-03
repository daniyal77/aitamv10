<?php

namespace Modules\Employee\App\Services;

use App\Services\Models\ServiceModel;
use Illuminate\Support\Facades\Auth;
use Modules\Employee\App\Enums\ContractType;
use Modules\Employee\App\Enums\EndOfService;
use Modules\Employee\App\Models\Employee;
use Modules\Employee\App\Services\traits\Employee\EmployeeCache;
use Modules\Employee\App\Services\traits\Employee\EmployeeFields;
use Modules\Employee\App\Services\traits\Employee\EmployeeRelational;

class EmployeeService extends ServiceModel
{
    use EmployeeRelational, EmployeeFields, EmployeeCache;

    function modelClass(): Employee
    {
        return new Employee();
    }

    public function dataReconcilement()
    {
        return [
            'endOfServices' => EndOfService::optionList(),
            'contactTypes'  => ContractType::optionList(),
        ];
    }

    public function createEmployee($data)
    {
        $data['start_contract'] = date('Y-m-d', $data['start_contract']);
        $data['end_contract'] = date('Y-m-d', $data['end_contract']);
        //todo remove when login Auth::user()->id ??
        $data['user_id'] = 1;
        $this->create($data);
    }
}
