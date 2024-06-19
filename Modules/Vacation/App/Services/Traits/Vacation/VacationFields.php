<?php

namespace Modules\Vacation\App\Services\Traits\Vacation;


trait VacationFields
{
    function getStatus()
    {
      return  $this->model->status;
    }
}

