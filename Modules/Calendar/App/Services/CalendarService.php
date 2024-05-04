<?php

namespace Modules\Calendar\App\Services;

use App\Services\Models\ServiceModel;

use Modules\Calendar\App\Models\Calendar;
use Modules\Calendar\App\Services\traits\Calendar\CalendarRelational;
use Modules\Calendar\App\Services\traits\Calendar\CalendarFields;
use Modules\Calendar\App\Services\traits\Calendar\CalendarCache;

class CalendarService extends ServiceModel
{
   use CalendarRelational,CalendarFields,CalendarCache;

   function modelClass(): Calendar
   {
        return new Calendar();
   }

}
