<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository extends BaseRepository
{
    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    public function getByUserId($userId)
    {
        return $this->model::join('course_users', 'courses.id', '=', 'course_users.course_id')
        ->join('categories', 'categories.id', '=', 'courses.category_id')
        ->where('user_id', $userId)
        ->select('courses.*', 'course_users.created_at as registerdate', 'categories.name as category')
        ->get();
    }
}
