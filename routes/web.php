<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Auth\User;
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
    return view('welcome');
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $user = User::find($request->route('id'));
    auth()->login($user);
})->middleware(['signed', 'auth'])->name('verification.verify');

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('user')->group(
        function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    }
    );
})->middleware(['auth', 'verified'])->name('admin');
