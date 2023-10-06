<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\CartRepository;
use App\Repositories\CourseRepository;
use App\Repositories\UserRepository;

class DashboardController extends Controller
{
    protected $cartRepository;
    protected $courseRepository;
    protected $userRepository;

    public function __construct(UserRepository $userRepository, CourseRepository $courseRepository, CartRepository $cartRepository)
    {
        $this->userRepository = $userRepository;
        $this->courseRepository = $courseRepository;
        $this->cartRepository = $cartRepository;
    }
    public function index()
    {
        return view('admin.dashboard.index',['orders'=>$this->cartRepository->getAllOrders(),
        'statistic'=> $this->cartRepository->getStatistic()]);
    }
}
