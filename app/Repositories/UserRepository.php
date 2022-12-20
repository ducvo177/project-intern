<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Schema;

class UserRepository
{
    protected $model;
    public const SORT_TYPES = ['desc', 'asc'];

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll(array $input = [])
    {
        $query = $this->model->query();
        $key = $input['key'] ?? "";
        if ($key) {
            return $query
                ->where('name', 'LIKE', "%{$key}%")
                ->orWhere('id', 'LIKE', "%{$key}%")
                ->orWhere('phone', 'LIKE', "%{$key}%")
                ->paginate(5);
        }
        $columnName = $input['column_name'] ?? "id";
        $sortType = $input['sort_type'] ?? "asc";
        $checkColumn = Schema::hasColumn('users', $columnName);
        $checkSortType = in_array(strtolower(trim($sortType)), static::SORT_TYPES);
        if ($checkColumn && $checkSortType) {
            return $query->orderBy($columnName, $sortType)->paginate(5);
        }
        return $query->paginate(5);
    }
}
