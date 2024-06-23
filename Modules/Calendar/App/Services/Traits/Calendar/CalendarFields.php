<?php

namespace Modules\Calendar\App\Services\Traits\Calendar;



trait CalendarFields
{

    function isHoliday()
    {
        return $this->model->is_holiday;
    }
    function getUserId()
    {
        return $this->model->user_id;
    }
}

