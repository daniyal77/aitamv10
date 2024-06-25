<?php

namespace Modules\Mission\App\Services;

use App\Services\Models\ServiceModel;
use Illuminate\Support\Facades\Cache;
use Modules\Employee\App\Services\EmployeeService;
use Modules\Mission\App\Models\Mission;
use Modules\Mission\App\Services\traits\Mission\MissionCache;
use Modules\Mission\App\Services\traits\Mission\MissionFields;
use Modules\Mission\App\Services\traits\Mission\MissionRelational;

class MissionService extends ServiceModel
{
    use MissionRelational, MissionFields, MissionCache;

    function modelClass(): Mission
    {
        return new Mission();
    }

    function allMission()
    {
        return Cache::remember($this->cacheMission(), 360, function () {
            return $this->paginateWithRelational(['employee', 'employee.employeeRequest']);
        });
    }

    function showEmployee()
    {
        return (new EmployeeService())->all();
    }
}
