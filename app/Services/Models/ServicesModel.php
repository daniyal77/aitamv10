<?php

namespace App\Services\Models;

abstract class ServicesModel
{

    public $model;

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function modelClass();

    /**
     * @param array $columns
     *
     * @return mixed
     */
    public function all($columns = array('*'))
    {
        return $this->modelClass()->get($columns);
    }

    /**
     * @param int $perPage
     * @param array $columns
     *
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->modelClass()->paginate($perPage, $columns);
    }

    /**
     * @param int $perPage
     * @param array $columns
     *
     * @return mixed
     */
    public function trash($perPage = 15, $columns = array('*'))
    {
        return $this->modelClass()->onlyTrashed()->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @param       $setModel
     */
    public function create(array $data, $setModel = false)
    {
        $model = $this->modelClass()->create($data);
        if ($setModel) {
            $this->model = $model;
            return $this;
        }

        return $model;
    }

    /**
     * @param array $data
     * @param        $id
     * @param string $attribute
     *
     * @return mixed
     */
    public function update(array $data, $id, $attribute = "id")
    {
        return $this->modelClass()->where($attribute, '=', $id)->update($data);
    }

    public function updateWithModel(array $data)
    {
        return $this->model->update($data);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id, $attribute = "id")
    {
        return $this->modelClass()->where($attribute, $id)->delete();
    }

    public function forceDelete($id, $attribute = "id")
    {
        return $this->modelClass()->where($attribute, $id)->forceDelete();
    }

    public function findWithRelation($id, $relations, $setModel = false, $columns = array('*'))
    {
        $model = $this->modelClass()->with($relations)->findOrFail($id, $columns);
        if ($setModel) {
            $this->model = $model;
            return $this;
        }
        return $model;
    }


    public function find($id, $setModel = false, $columns = array('*'))
    {
        $model = $this->modelClass()->findOrFail($id, $columns);
        if ($setModel) {
            $this->model = $model;
            return $this;
        }
        return $model;
    }

    /**
     * @param       $attribute
     * @param       $value
     * @param array $columns
     *
     */
    public function findBy($attribute, $value, $setModel = false, $columns = array('*'))
    {
        $model = $this->modelClass()->where($attribute, '=', $value)->first($columns);

        if ($setModel) {
            $this->model = $model;
            return $this;
        }
        return $model;
    }

    /**
     * @param $where
     * @param $data
     *
     * @return mixed
     */
    public function updateOrCreate($where = [], $data = [],)
    {
        return $this->modelClass()->updateOrCreate(
            $where, $data
        );
    }

    /**
     * @param $condition
     *
     * @return boolean
     */
    public function exist($key, $value)
    {
        $object = $this->findBy($key, $value);
        if (!$object) return false;
        return true;
    }

    /**
     * @param $action
     * @param $selection
     * @param $field
     *
     * @return void
     */
    public function runAction($action, $selection = [], $field = 'id')
    {

        if ($action == '' || $selection == null)
            return;

        switch ($action) {
            case "delete":
                $this->modelClass()->whereIn($field, $selection)->forceDelete();
                break;
            case "restore":
                $this->modelClass()->whereIn($field, $selection)->restore();
                break;
            case "destroy":
                $this->modelClass()->whereIn($field, $selection)->delete();
                break;
        }
    }

    public function findAndSetModel($value, $attribute = 'id', $cols = '*')
    {
        $this->model = $this->findBy($attribute, $value, $cols);
        return $this;
    }

    /**
     * @param       $attribute
     * @param       $value
     * @param array $columns
     *
     */
    public function where($whereArray = [], $setModel = false, $cols = '*')
    {
        $model = $this->modelClass()->where($whereArray)->get($cols);

        if ($setModel) {
            $this->model = $model;
            return $this;
        }
        return $model;
    }


    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }


}

