<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Repositories\CourseRepository;
use App\Services\CartService;
use App\Services\MailService;

class CartController extends Controller
{
    protected $courseRepository;
    protected $cartService;
    protected $mailService;

    public function __construct(CourseRepository $courseRepository, CartService $cartService, MailService $mailService)
    {
        $this->courseRepository = $courseRepository;
        $this->cartService = $cartService;
        $this->mailService = $mailService;
    }

    public function index()
    {
        $totalPrice = 0;
        foreach (app(CartService::class)->getAll() as $cartItem) {
            $totalPrice += $cartItem['price'] * $cartItem['quantity'];
        };

        return view('cart.index', ['total' => app(CartService::class)->total(), 'totalPrice' => $totalPrice]);
    }

    public function addToCart($id)
    {
        $course = $this->courseRepository->findById($id, Course::class);
        $cartService = app(CartService::class);

        if (empty($course)) {
            abort(404);
        }

        if ($cartService->exist($course->id)) {
            $cartService->update([$course->id => 1], false);
            return redirect()->back()->with('notification', 'Product added to cart successfully!');
        }

        $cartService->insert($course);
        return redirect()->back()->with('notification', 'Product added to cart successfully!');
    }

    public function deleteCourse($id)
    {
        if (!app(CartService::class)->exist($id)) {
            abort(404);
        }

        app(CartService::class)->removeItem($id);
        return redirect()->route('cart')->with('notification', 'Remove course from cart successfully!!');
    }

    public function updateCart()
    {
        $quantity = request()->quantity;
        app(CartService::class)->update($quantity);
        return redirect()->route('cart')->with('notification', 'Update course from cart successfully!!');
    }

    public function deleteAll()
    {
        app(CartService::class)->destroy();
        return redirect()->route('cart')->with('notification', 'Delete all cart successfully!!');
    }
    public function checkoutCart()
    {
        $this->mailService->sendMailCheckoutOrder(request()->user(), app(CartService::class)->getAll(), request()->total);
        app(CartService::class)->destroy();
        return redirect()->route('cart')->with('notification', 'Checkout cart successfully!!');
    }
}
