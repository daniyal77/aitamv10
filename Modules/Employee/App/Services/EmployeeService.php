<?php

namespace Modules\Employee\App\Services;

use App\Services\Models\ServiceModel;
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
            'contactTypes'   => ContractType::optionList(),
        ];
    }
}
