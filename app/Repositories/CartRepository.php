<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\CourseUser;

class CartRepository extends BaseRepository
{
    public function __construct(CourseUser $model)
    {
        $this->model = $model;
    }
    public function getCourseById($id)
    {
        return $this->model->where('user_id', $id)->get();
    }
}
