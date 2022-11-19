<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostsController;
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


// Auth routes
require __DIR__ . '/auth.php';

Route::redirect('/', '/feed', 301);


Route::group(['middleware' => 'auth'], function () {
    Route::resource('post', PostsController::class);
    Route::resource('comment', CommentsController::class);
    Route::resource('like', LikesController::class);
    Route::get('/feed', FeedController::class)->name('feed');
});
