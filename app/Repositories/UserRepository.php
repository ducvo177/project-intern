<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Schema;

class UserRepository
{
    protected $model;
    public const SORT_TYPES = ['desc', 'asc'];
    public const PER_PAGE = 5;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll(array $input = [])
    {
        $query = $this->model->query();
        $key=$input['key']??'';
        $role=$input['role']??'';

        if ($key) {
            $query->where(function ($query) use ($key){
                $query->where('name', 'LIKE', "%{$key}%")
                    ->orWhere('id', 'LIKE', "%{$key}%")
                    ->orWhere('phone', 'LIKE', "%{$key}%");
            });
        }

        if ($role) {
            $query->where('type', $role);
        }

        $columnName = $input['column_name'] ?? 'id';
        $sortType = $input['sort_type'] ?? 'asc';
        $checkColumn = Schema::hasColumn('users', $columnName);
        $checkSortType = in_array(strtolower(trim($sortType)), static::SORT_TYPES);

        if ($checkColumn && $checkSortType) {
            $query->orderBy($columnName, $sortType);
        }

        return $query->paginate(static::PER_PAGE);
    }
}
