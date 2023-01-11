<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Repositories\CourseRepository;
use App\Services\CartService;

class CartController extends Controller
{
    protected $courseRepository;
    protected $cartService;

    public function __construct(CourseRepository $courseRepository, CartService $cartService)
    {
        $this->courseRepository = $courseRepository;
        $this->cartService = $cartService;
    }

    public function index()
    {
        return view('cart.index');
    }

    public function addToCart($id)
    {
        $course = $this->courseRepository->findById($id, Course::class);
        $this->cartService->insert($course);
        return redirect()->route('home')->with('notification', 'Add course successfully!!');
    }
}
