<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\CourseUser;
use Illuminate\Support\Facades\DB;

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
    public function getStatistic(){
        $userCount = DB::table('users')->where('is_delete',0)->count();
        $courseCount = DB::table('courses')->where('is_delete',0)->count();
        $categoryCount = DB::table('categories')->where('is_delete',0)->count();
        $courseUserCount = DB::table('course_user')->where('is_delete',0)->count();

        return [
            'user_count' => $userCount,
            'course_count' => $courseCount,
            'category_count' => $categoryCount,
            'course_user_count' => $courseUserCount,
        ];
    }
    public function getAllOrders()
    {
        return  $this->model
        ->join('users', 'course_user.user_id', '=', 'users.id')
        ->join('courses', 'course_user.course_id', '=', 'courses.id')
        ->select(
            'course_user.*',
            'users.name as user_name',
            'courses.name as course_name'
        )
        ->get();
    }
}
