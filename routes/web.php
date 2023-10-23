<?php

declare(strict_types=1);

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/email/verify/{id}/{hash}', [VerifycationController::class, 'verify'])->middleware(['signed', 'verified'])->name('verification.verify');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/change-password', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showForm'])->name('change_password');
Route::post('/update-password', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'updatePassword'])->name('update_password');
Route::resource('user', App\Http\Controllers\Backend\UserController::class);
Route::resource('course', App\Http\Controllers\Backend\CourseController::class);
Route::prefix('admin')->middleware(['auth', 'is.admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/contact', [App\Http\Controllers\Backend\ContactController::class, 'index'])->name('admin.contact');
    Route::resource('cart', App\Http\Controllers\Backend\CartController::class);
})->name('admin');

Route::post('/contact', [App\Http\Controllers\Backend\ContactController::class, 'store'])->name('contact');
Route::get('/cart', [App\Http\Controllers\Backend\CartController::class, 'index'])->name('cart');
Route::get('/add-to-cart/{id}', [App\Http\Controllers\Backend\CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/delete-from-cart/{id}', [App\Http\Controllers\Backend\CartController::class, 'deleteCourse'])->name('delete-from-cart');
Route::get('/delete-all', [App\Http\Controllers\Backend\CartController::class, 'deleteAll'])->name('delete-all');
Route::post('/update-cart', [App\Http\Controllers\Backend\CartController::class, 'updateCart'])->name('update-cart');
Route::post('/checkout-cart', [App\Http\Controllers\Backend\CartController::class, 'checkoutCart'])->name('checkout-cart')->middleware('auth');
Route::view('paypal/payment', 'paypal.index')->name('create.payment');
Route::get('paypal/handle-payment', [App\Http\Controllers\PaymentController::class, 'handlePayment'])->name('make.payment');
Route::get('paypal/cancel-payment', [App\Http\Controllers\PaymentController::class, 'paymentCancel'])->name('cancel.payment');
Route::get('paypal/payment-success', [App\Http\Controllers\PaymentController::class, 'paymentSuccess'])->name('success.payment');
