<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Repositories\BillRepository;
use App\Repositories\CartRepository;
use App\Repositories\CourseRepository;
use App\Services\CartService;
use App\Services\MailService;
use Illuminate\Http\Request as HttpRequest;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CartController extends Controller
{
    protected $courseRepository;

    protected $cartRepository;
    protected $cartService;
    protected $mailService;

    protected $billRepository;

    public function __construct(CourseRepository $courseRepository,CartRepository $cartRepository, CartService $cartService, MailService $mailService, BillRepository $billRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->cartRepository = $cartRepository;
        $this->cartService = $cartService;
        $this->mailService = $mailService;
        $this->billRepository = $billRepository;
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

            return redirect()->back()->with('error', 'Khóa học đã được thêm vào giỏ hàng rồi!');
        }

        $cartService->insert($course);
        return redirect()->back()->with('notification', 'Khóa học được thêm vào giỏ hàng thành công!');
    }

    public function deleteCourse($id)
    {
        if (!app(CartService::class)->exist($id)) {
            abort(404);
        }

        app(CartService::class)->removeItem($id);
        return redirect()->route('cart')->with('notification', 'Xóa khóa học khỏi giỏ hàng thành công!!');
    }

    public function updateCart()
    {
        $quantity = request()->quantity;
        app(CartService::class)->update($quantity);
        return redirect()->route('cart')->with('notification', 'Sửa giỏ hàng thành công!!');
    }

    public function deleteAll()
    {
        app(CartService::class)->destroy();
        return redirect()->route('cart')->with('notification', 'Đã xóa giỏ hàng!!');
    }
    public function checkoutCart(HttpRequest $request)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('home'),
                "cancel_url" => route('cancel.payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->input('total')
                    ]
                ]
            ]
        ]);

        $this->billRepository->save(['user_id'=> Auth()->user()->id, 'price'=> $request->input('total')]);

        $this->mailService->sendMailCheckoutOrder(request()->user(), app(CartService::class)->getAll(), request()->total);
        $oldOrder = $this->cartRepository->getCourseById( request()->user()->id);

        foreach (app(CartService::class)->getAll() as $cartItem) {
            $inputs['course_id'] =$cartItem->id;
            $inputs['user_id'] = request()->user()->id;
            $inputs['paid']=1;
            $existingOrder = collect($oldOrder)->first(function ($order) use ($cartItem) {
                return $order->course_id == $cartItem->id;
            });

            if (!$existingOrder) {
                $this->cartRepository->save($inputs);
            }
        };

        app(CartService::class)->destroy();
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('home')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    public function destroy($id)
    {
        $inputs['is_delete']= 1;
        $this->cartRepository->save($inputs,['id'=> $id]);
        return redirect()->route('dashboard')->with('notification', 'Xóa đơn hàng thành công!!');
    }
}
