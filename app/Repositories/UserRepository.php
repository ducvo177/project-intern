<?php

namespace App\Repositories;

use App\Exceptions\UserException;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

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
            request()->session()->put('key', "");
            $sortBy = $input['sort-by'] ?? "id";
            $sortType = $input['sort-type'] ?? "asc";
            if (!Schema::hasColumn('users', $sortBy)) {
                throw new UserException;
            }
            return $query->orderBy($sortBy, $sortType)->paginate(5);
        }
    }
}
