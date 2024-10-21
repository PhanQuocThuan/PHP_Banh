<?php

use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminTypeController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KindController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name("home.index");
Route::get('/home', [HomeController::class,'index'])->name("home.index");
Route::get('/home/{ProductID}', [HomeController::class,'show'])->name("home.show");

Route::get('/kind', [KindController::class, 'index'])->name('kind.index');
Route::get('/kind/type/{TypeID}', [KindController::class, 'filterByType'])->name('kind.type');

Route::get('/introduce', function () {return view('kind.introduce');});

Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{ProductID}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{ProductID}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/add/{ProductID}', [CartController::class, 'add'])->name('cart.add');

Route::post('/order', [OrderController::class, 'createOrder'])->name('order.create');

Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'create'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('/admin', [AdminHomeController::class, 'count'])->name('admin.home.index');
});
Route::resource('/admin/user',AdminUserController::class)
->names([
        'index' => 'admin.user.index',
        'create' => 'admin.user.create',
        'store' => 'admin.user.store',
        'show' => 'admin.user.show',
        'edit' => 'admin.user.edit',
        'update' => 'admin.user.update',
        'destroy' => 'admin.user.destroy',
]);

Route::resource('/admin/product',AdminProductController::class)
->names([
        'index' => 'admin.product.index',
        'create' => 'admin.product.create',
        'store' => 'admin.product.store',
        'show' => 'admin.product.show',
        'edit' => 'admin.product.edit',
        'update' => 'admin.product.update',
        'destroy' => 'admin.product.destroy',
]);

Route::resource('/admin/type',AdminTypeController::class)
->names([
        'index' => 'admin.type.index',
        'create' => 'admin.type.create',
        'store' => 'admin.type.store',
        'show' => 'admin.type.show',
        'edit' => 'admin.type.edit',
        'update' => 'admin.type.update',
        'destroy' => 'admin.type.destroy',
]);

Route::get('/cart', function () {
    return view('cart.index');
});
