<?php

namespace App\Services\Models;

abstract class ServiceModel extends ServicesModel
{
    public function getId()
    {
        return $this->model->id;
    }

    public function getCreatedAt()
    {
        return $this->model->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->model->updated_at;
    }
}
