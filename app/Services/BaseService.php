<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class BaseService
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id,$data)
    {
        return $this->model->update($id,$data);
    }

    public function delete($id)
    {
        return $this->model->delele($id);
    }

    // Add more common service methods as per your needs
}
