<?php

namespace App\Repositories;

use App\Models\User;

class BaseRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function store(array $inputs, array $conditions = ['id' => null])
    {
        return $this->model->updateOrCreate($conditions, $inputs);
    }
}
