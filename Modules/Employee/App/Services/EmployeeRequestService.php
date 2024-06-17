<?php

namespace Modules\Employee\App\Services;

use App\Services\Models\ServiceModel;

use Modules\Employee\App\Models\EmployeeRequest;
use Modules\Employee\App\Services\traits\EmployeeRequest\EmployeeRequestRelational;
use Modules\Employee\App\Services\traits\EmployeeRequest\EmployeeRequestFields;
use Modules\Employee\App\Services\traits\EmployeeRequest\EmployeeRequestCache;

class EmployeeRequestService extends ServiceModel
{
   use EmployeeRequestRelational,EmployeeRequestFields,EmployeeRequestCache;

   function modelClass(): EmployeeRequest
   {
        return new EmployeeRequest();
   }

}
