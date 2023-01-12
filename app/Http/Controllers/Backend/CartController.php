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
        return view('cart.index',['total'=> app(CartService::class)->total()]);
    }

    public function addToCart($id)
    {
        $course = $this->courseRepository->findById($id, Course::class);
        if(empty($course)){
            abort(404);
        }
        app(CartService::class)->insert($course);

        return redirect()->route('home')->with('notification', 'Add course successfully!!');
    }
    public function deleteCourse($id)
    {
        app(CartService::class)->removeItem($id);
        return redirect()->route('cart')->with('notification', 'Remove course from cart successfully!!');
    }

    public function deleteAll(){
        app(CartService::class)->destroy();
        return redirect()->route('cart')->with('notification', 'Delete all cart successfully!!');
    }
}
