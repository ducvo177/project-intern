<?php

namespace App\Http\Controllers;

use App\Repositories\CourseRepository;

class HomeController extends Controller
{
    protected $courseRepository;
    public function __construct(CourseRepository $courseRepository)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->courseRepository = $courseRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',['courses' => $this->courseRepository->getAll(request()->all())]);
    }
}
