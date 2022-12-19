<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll(array $input = [])
    {
        $query = $this->model->query();
        $key = request()->key;
        if ($key) {
            request()->session()->put('key', $key);
            return $query
                ->where('name', 'LIKE', "%{$key}%")
                ->orWhere('id', 'LIKE', "%{$key}%")
                ->orWhere('phone', 'LIKE', "%{$key}%")
                ->paginate(5);
        } else {
            $sortBy = $input['sort-by'] ?? "id";
            $sortType = $input['sort-type'] ?? "asc";
            return $query->orderBy($sortBy, $sortType)->paginate(5);
        }
    }
}
