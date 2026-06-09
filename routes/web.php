<?php

use Illuminate\Support\Facades\Route;

/*
CONTROLLERS
*/
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PhoneController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

/*
USER FRONTEND (PHONE SHOP)
*/

/* Home & Shop */
Route::get('/', [ShopController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index'])->name('products.index');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('products.show');

/* Cart */
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

/* Checkout */
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});

/* Orders (User) */
Route::middleware('auth')->group(function () {
    Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/my-orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

/* Invoice */
Route::middleware('auth')->get(
    '/invoice/{order}',
    [InvoiceController::class, 'download']
)->name('invoice.download');

/*
AUTH / PROFILE
*/
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
ADMIN PANEL (ADMIN ONLY)
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /* Dashboard */
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        /* Phones CRUD */
        Route::resource('phones', PhoneController::class);

        /* Orders */
        Route::get('/orders', [AdminOrderController::class, 'index'])
            ->name('orders.index');
        Route::get('/orders/{order}', [AdminOrderController::class, 'show'])
            ->name('orders.show');
        Route::post('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
            ->name('orders.status');

        /* Users */
        Route::resource('users', AdminUserController::class)->except(['show']);
    });

/*
AUTH ROUTES (LOGIN / REGISTER)
*/
require __DIR__ . '/auth.php';