<?php

namespace Modules\Vacation\App\Services;

use App\Services\Models\ServiceModel;

use Modules\Vacation\Entities\Vacation;
use Modules\Vacation\App\Services\traits\Vacation\VacationRelational;
use Modules\Vacation\App\Services\traits\Vacation\VacationFields;
use Modules\Vacation\App\Services\traits\Vacation\VacationCache;

class VacationService extends ServiceModel
{
   use VacationRelational,VacationFields,VacationCache;

   function modelClass(): Vacation
   {
        return new Vacation();
   }

}
