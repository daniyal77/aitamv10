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

    function createMission($data)
    {
        $data['start_date'] = date('Y-m-d', $data['start_date']);
        $data['end_date'] = date('Y-m-d', $data['end_date']);
        //todo remove when login Auth::user()->id ??
        $data['user_id'] = 1;
        $this->create($data);
        $this->removeCacheMission();
    }

    function showEmployee()
    {
        return (new EmployeeService())->all();
    }
}
