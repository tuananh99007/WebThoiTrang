<?php

use App\Http\Controllers\Admin\AuthenticateController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Users\AuthenticateController as UsersAuthenticateController;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Users\ProductController as UsersProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('users.home.index');
Route::get('/category_detail', [HomeController::class, 'category_detail'])->name('users.home.category_detail');
Route::get('/detail', [HomeController::class, 'detail'])->name('users.home.detail');

Route::get('users/login', [UsersAuthenticateController::class, 'login'])->name('users.authenticate.login');
Route::post('users/postlogin', [UsersAuthenticateController::class, 'postlogin'])->name('users.authenticate.postlogin');
Route::get('users/register', [UsersAuthenticateController::class, 'register'])->name('users.authenticate.register');
Route::post('users/postRegister', [UsersAuthenticateController::class, 'postRegister'])->name('users.authenticate.postRegister');
Route::get('users/logout', [UsersAuthenticateController::class, 'logout'])->name('users.users.logout');
Route::get('users/forgotPassword', [UsersAuthenticateController::class, 'forgotPassword'])->name('users.users.forgotPassword');
Route::post('users/postforgotPassword', [UsersAuthenticateController::class, 'postforgotPassword'])->name('users.authenticate.postforgotPassword');

Route::prefix('users')->middleware(['auth_users'])->group(function () {
    Route::prefix('home')->group(function () {
        Route::get('/add', [HomeController::class, 'add'])->name('users.home.add');
        Route::get('/cart', [HomeController::class, 'cart'])->name('users.home.cart');
        Route::get('/cart_list', [HomeController::class, 'cart_list'])->name('users.home.cart_list');
        Route::get('/cart_detail', [HomeController::class, 'cart_detail'])->name('users.home.cart_detail');
    });
    Route::prefix('product')->group(function () {
        Route::get('/add_product', [UsersProductController::class, 'add_product'])->name('users.product.add_product');
        Route::get('/reduce', [UsersProductController::class, 'reduce'])->name('users.product.reduce');
        Route::get('/delete', [UsersProductController::class, 'delete'])->name('users.product.delete');
        Route::get('/order', [UsersProductController::class, 'order'])->name('users.product.order');
        Route::get('/confirm', [UsersProductController::class, 'confirm'])->name('users.product.confirm');
    });
});

Route::get('admin/login', [AuthenticateController::class, 'login'])->name('admin.authenticate.login');
Route::post('admin/postlogin', [AuthenticateController::class, 'postlogin'])->name('admin.authenticate.postlogin');
Route::get('admin/register', [AuthenticateController::class, 'register'])->name('admin.register');
Route::post('admin/postRegister', [AuthenticateController::class, 'postRegister'])->name('admin.authenticate.postRegister');
Route::get('admin/logout', [AuthenticateController::class, 'logout'])->name('admin.authenticate.logout');

Route::prefix('admin')->middleware(['auth_admin'])->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('list', [CategoryController::class, 'list'])->name('admin.category.list');
        Route::get('add', [CategoryController::class, 'add'])->name('admin.category.add');
        Route::post('postadd', [CategoryController::class, 'postadd'])->name('admin.category.postadd');
        Route::get('update', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::post('postupdate', [CategoryController::class, 'postupdate'])->name('admin.category.postupdate');
        Route::get('detail', [CategoryController::class, 'detail'])->name('admin.category.detail');
        Route::get('delete', [CategoryController::class, 'delete'])->name('admin.category.delete');
        Route::get('detail_bin', [CategoryController::class, 'detail_bin'])->name('admin.category.detail_bin');
        Route::get('delete_trash', [CategoryController::class, 'delete_trash'])->name('admin.category.delete_trash');
        Route::get('restore', [CategoryController::class, 'restore'])->name('admin.category.restore');
        Route::get('restore_all', [CategoryController::class, 'restore_all'])->name('admin.category.restore_all');
        Route::get('delete_all', [CategoryController::class, 'delete_all'])->name('admin.category.delete_all');
    });

    Route::prefix('product')->group(function () {
        Route::get('list', [ProductController::class, 'list'])->name('admin.product.list');
        Route::get('add', [ProductController::class, 'add'])->name('admin.product.add');
        Route::post('postadd', [ProductController::class, 'postadd'])->name('admin.product.postadd');
        Route::get('update', [ProductController::class, 'update'])->name('admin.product.update');
        Route::post('postupdate', [ProductController::class, 'postupdate'])->name('admin.product.postupdate');
        Route::get('detail', [ProductController::class, 'detail'])->name('admin.product.detail');
        Route::get('delete', [ProductController::class, 'delete'])->name('admin.product.delete');
        Route::get('detail_bin', [ProductController::class, 'detail_bin'])->name('admin.product.detail_bin');
        Route::get('delete_trash', [ProductController::class, 'delete_trash'])->name('admin.product.delete_trash');
        Route::get('restore', [ProductController::class, 'restore'])->name('admin.product.restore');
        Route::get('restore_all', [ProductController::class, 'restore_all'])->name('admin.product.restore_all');
        Route::get('delete_all', [ProductController::class, 'delete_all'])->name('admin.product.delete_all');
    });

    Route::prefix('users')->group(function () {
        Route::get('list_admin', [UsersController::class, 'list_admin'])->name('admin.users.list_admin');
        Route::get('list_users', [UsersController::class, 'list_users'])->name('admin.users.list_users');
        Route::get('add', [UsersController::class, 'add'])->name('admin.users.add');
        Route::post('postadd', [UsersController::class, 'postadd'])->name('admin.users.postadd');
        Route::get('update', [UsersController::class, 'update'])->name('admin.users.update');
        Route::post('postupdate', [UsersController::class, 'postupdate'])->name('admin.users.postupdate');
        Route::get('detail', [UsersController::class, 'detail'])->name('admin.users.detail');
        Route::get('delete', [UsersController::class, 'delete'])->name('admin.users.delete');
        Route::get('detail_bin', [UsersController::class, 'detail_bin'])->name('admin.users.detail_bin');
        Route::get('delete_trash', [UsersController::class, 'delete_trash'])->name('admin.users.delete_trash');
        Route::get('restore', [UsersController::class, 'restore'])->name('admin.users.restore');
        Route::get('restore_all', [UsersController::class, 'restore_all'])->name('admin.users.restore_all');
        Route::get('delete_all', [UsersController::class, 'delete_all'])->name('admin.users.delete_all');
        Route::get('profile', [UsersController::class, 'profile'])->name('admin.users.profile');
    });

    Route::prefix('cart')->group(function () {
        Route::get('purchase_account', [CartController::class, 'purchase_account'])->name('admin.cart.purchase_account');
        Route::get('listcart', [CartController::class, 'listcart'])->name('admin.cart.listcart');
        Route::get('detail_cart', [CartController::class, 'detail_cart'])->name('admin.cart.detail_cart');
        Route::get('confirm', [CartController::class, 'confirm'])->name('admin.cart.confirm');
    });
});
