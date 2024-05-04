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

    /**
     * @return array
     */
    public function dataReconcilement(): array
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

    public function updateEmployee($data, $id)
    {
        $data['start_contract'] = date('Y-m-d', $data['start_contract']);
        $data['end_contract'] = date('Y-m-d', $data['end_contract']);
        //todo remove when login Auth::user()->id ??
        //todo add log
        $data['user_id'] = 1;
        $this->update($data, $id);
    }
}
