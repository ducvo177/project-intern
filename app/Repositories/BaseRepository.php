<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

class BaseRepository
{
    protected $model;
    public const SORT_TYPES = ['desc', 'asc'];
    public const PER_PAGE = 5;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function save(array $inputs, array $conditions = ['id' => null])
    {
        return $this->model->updateOrCreate($conditions, $inputs);
    }

    public function findById($id, $model)
    {
        return $model::find($id);
    }
}
