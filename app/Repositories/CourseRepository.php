<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Support\Facades\Schema;

class CourseRepository extends BaseRepository
{
    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    public function getByUserId($userId)
    {
        return $this->model->whereRelation('users', 'users.id', $userId)->with('category')->withCount('lessons')->get();
    }

    public function getAll(array $input = [])
    {
        $query = $this->model->query();
        $keyword = $input['key'] ?? '';

        if ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('category_id', 'LIKE', "%{$keyword}%");
            });
        }

        if (!empty($input['category'])) {
            $query->where('category_id', $input['category']);
        }

        $columnName = $input['column_name'] ?? 'id';
        $sortType = $input['sort_type'] ?? 'asc';
        $checkColumn = Schema::hasColumn('courses', $columnName);
        $checkSortType = in_array(strtolower(trim($sortType)), static::SORT_TYPES);

        if ($checkColumn && $checkSortType) {
            $query->orderBy($columnName, $sortType);
        }

        $query->withCount(['lessons','sections','users'])->with('category');
        return $query->paginate(static::PER_PAGE);
    }
}
