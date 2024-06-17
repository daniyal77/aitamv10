<?php

namespace Modules\Vacation\App\Services;

use App\Services\Models\ServiceModel;
use Modules\Employee\App\Services\EmployeeService;
use Modules\Vacation\App\Models\Vacation;
use Modules\Vacation\App\Services\traits\Vacation\VacationCache;
use Modules\Vacation\App\Services\traits\Vacation\VacationFields;
use Modules\Vacation\App\Services\traits\Vacation\VacationRelational;

class VacationService extends ServiceModel
{
    use VacationRelational, VacationFields, VacationCache;

    function modelClass(): Vacation
    {
        return new Vacation();
    }

    function createVacation($data)
    {
        $data['start_date'] = date('Y-m-d', $data['start_date']);
        $data['end_date'] = date('Y-m-d', $data['end_date']);
        //todo remove when login Auth::user()->id ??
        $data['user_id'] = 1;
        $this->create($data);
    }

    function showEmployee()
    {
        return (new EmployeeService())->all();
    }
}
