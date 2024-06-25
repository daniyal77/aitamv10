<?php

namespace Modules\Mission\App\Services\Traits\Mission;

trait MissionFields
{
    function getStatus()
    {
        return $this->model->status;
    }
}

