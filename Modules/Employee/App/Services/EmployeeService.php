<?php

namespace Modules\Employee\App\Services;

use App\Services\Models\ServiceModel;

use Modules\Employee\Entities\Employee;
use Modules\Employee\App\Services\traits\Employee\EmployeeRelational;
use Modules\Employee\App\Services\traits\Employee\EmployeeFields;
use Modules\Employee\App\Services\traits\Employee\EmployeeCache;

class EmployeeService extends ServiceModel
{
   use EmployeeRelational,EmployeeFields,EmployeeCache;

   function modelClass(): Employee
   {
        return new Employee();
   }

}
