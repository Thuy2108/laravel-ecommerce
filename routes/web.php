<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\ProductFrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;

// ================== ADMIN USERS ==================
Route::get('admin/them-nguoi-dung', [UserController::class, 'insert_form']);
Route::post('admin/xu-ly-them-nguoi-dung', [UserController::class, 'action_insert']);
Route::get('admin/danh-sach-nguoi-dung', [UserController::class, 'get_all']);
Route::get('admin/xoa-nguoi-dung/{id}', [UserController::class, 'del']);
Route::get('admin/thong-tin-nguoi-dung/{id}', [UserController::class, 'show']);
Route::post('admin/xu-ly-cap-nhat-nguoi-dung', [UserController::class, 'action_update']);

// ================== ADMIN PRODUCTS ==================
Route::get('admin/them-san-pham', [App\Http\Controllers\admin\ProductController::class, 'insert_form']);
Route::post('admin/xu-ly-them-san-pham', [App\Http\Controllers\admin\ProductController::class, 'action_insert']);
Route::get('admin/danh-sach-san-pham', [App\Http\Controllers\admin\ProductController::class, 'get_all']);
Route::get('admin/xoa-san-pham/{id}', [App\Http\Controllers\admin\ProductController::class, 'del']);
Route::get('admin/thong-tin-san-pham/{id}', [App\Http\Controllers\admin\ProductController::class, 'show']);
Route::post('admin/xu-ly-cap-nhat-san-pham', [App\Http\Controllers\admin\ProductController::class, 'action_update']);

// ================== FRONTEND ==================
Route::get('/', [HomeController::class, 'index'])->name('home');

// ================== LOGIN / LOGOUT ==================
Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('act_login', [UserController::class, 'action_login'])->name('act_login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

// ================== FRONTEND CATEGORY & PRODUCT ==================
Route::get('category-list', [CategoryController::class, 'index'])->name('category.list');
Route::get('product-list', [ProductFrontendController::class, 'index'])->name('product.list');
//================ CART ===============//
Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/add/{id}', [CartController::class, 'addToCart']);
Route::get('/cart/remove/{id}', [CartController::class, 'remove']);
Route::get('/product/{id}', [App\Http\Controllers\ProductFrontendController::class, 'detail'])->name('product.show');

// CHECKOUT
Route::post('/checkout', [CheckoutController::class, 'process'])
    ->name('checkout.process');

Route::get('/checkout/{order_id}', [CheckoutController::class, 'checkout'])
    ->name('checkout');

Route::post('/order/{order_id}/confirm', [CheckoutController::class, 'confirm'])
    ->name('order.confirm');

// ================== GREETING EXAMPLES ==================
Route::prefix('greeting')->group(function () {
    Route::get('vn', function () { return "Xin chào!"; });
    Route::get('en', function () { return "Hello!"; });
    Route::get('cn', function () { return "你好!"; });
});

// ================== USER COMMENT EXAMPLE ==================
Route::get('user/{id}/comment/{commentId}', function ($id, $commentId) {
    return "User id: $id and comment id: $commentId";
});

// ================== LẤY DỮ LIỆU ==================
Route::get('laydulieu', function () {
    $data = DB::table('user')->get();
    print_r($data);
});
