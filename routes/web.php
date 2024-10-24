<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

use Illuminate\Support\Facades\Route;

//------------------------ Категория Контроллер ------------------------------------
Route::get('/', [CategoryController::class, 'index']);
Route::get('/category-create', [CategoryController::class, 'create']);
Route::post('/category', [CategoryController::class, 'store']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::delete('/categoryss/{id}', [CategoryController::class, 'delete']);
//------------------------ Пост Контроллер ------------------------------------
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts-create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::delete('/posts/{id}', [PostController::class, 'delete']);
//------------------------ Продукт Контроллер ------------------------------------
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products-create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::delete('/products/{id}', [ProductController::class, 'delete']);
//------------------------Контроллер для Заказов------------------------------------
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders-create', [OrderController::class, 'create']);
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders/{id}', [OrderController::class, 'show']);
Route::delete('/orders/{id}', [OrderController::class, 'delete']);
//------------------------Коммент Контроллер ------------------------------------
Route::get('/comment', [CommentController::class, 'index']);
Route::get('/comment-create', [CommentController::class, 'create']);
Route::post('/comment', [CommentController::class, 'store']);

Route::get('/comment/{id}', [CommentController::class, 'show']);
Route::delete('/comment/{id}', [CommentController::class, 'delete']);
//------------------------ Лайк Контроллер ------------------------------------
Route::get('/likes', [LikeController::class, 'index']);
Route::get('/like-create', [LikeController::class, 'create']);
Route::post('/likes', [LikeController::class, 'store']);

Route::get('/likes/{id}', [LikeController::class, 'show']);
Route::delete('/likes/{id}', [LikeController::class, 'delete']);

Route::get('/laravel', function () {
    return view('welcome');
});
