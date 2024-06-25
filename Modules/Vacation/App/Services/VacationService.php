<?php

namespace Modules\Vacation\App\Services;

use App\Enums\Status;
use App\Services\Models\ServiceModel;
use Illuminate\Support\Facades\Cache;
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

    function allVacation()
    {
        return Cache::remember($this->cacheVacation(), 360, function () {
            return $this->paginateWithRelational(['employee', 'employee.employeeRequest']);
        });
    }

    function createVacation($data)
    {
        $data['start_date'] = date('Y-m-d', $data['start_date']);
        $data['end_date'] = date('Y-m-d', $data['end_date']);
        //todo remove when login Auth::user()->id ??
        $data['user_id'] = 1;
        $this->create($data);
       $this->removeCacheVacation();
    }

    function showEmployee()
    {
        return (new EmployeeService())->all();
    }

    function updateVacation($id, $startDate, $endDate, $intro)
    {
        $vacation = $this->find(id: $id, setModel: true);
        if ($vacation->getStatus() != Status::PENDING)
            return "";

        //todo اگه مرخصی تایید یا رد شده بود نشه ویرایش کرد
        //todo remove when login Auth::user()->id ??
        $data = [
            'start_date' => date('Y-m-d', $startDate),
            'end_date'   => date('Y-m-d', $endDate),
            'intro'      => $intro,
            'status'     => Status::PENDING,
            'user_id'    => 1,
        ];
        $this->update(data: $data, id: $id);
        (new VacationService())->removeCacheVacation();

    }

}
