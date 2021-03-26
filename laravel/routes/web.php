<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexPageController;
use App\Http\Controllers\PostAjaxController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\InfileController;
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

Route::get('/', [IndexPageController::class, 'show']);

Route::post('/post-do', [PostAjaxController::class, "nonReturnQuery"]);
Route::post('/post-get', [PostAjaxController::class, "returnQuery"]);
Route::get('/get-new-cars', [PostAjaxController::class, "returnNewCars"]);
Route::get('/get-pagination-info', [PostAjaxController::class, "returnPgInfo"]);
Route::post('/get-titles-for-search', [PostAjaxController::class, "returnTitles"]);
Route::post('/login', [LoginController::class, "login"]);
Route::post('/register', [RegisterController::class, "register"]);
Route::post('/forgot-password', [ForgotPasswordController::class, "forgot"]);
Route::any('/new-password', [NewPasswordController::class, "new"]);
Route::get('/log-out', [LogOutController::class, "logout"]);
Route::get('/car/{id}/{title}', [InfileController::class, 'infile']);
Route::get('/get-time/{id}', [PostAjaxController::class, 'getTime']);
Route::post('/create-comment', [PostAjaxController::class, 'createComment']);
Route::get('/get-newest-comments/{id}', [PostAjaxController::class, 'getNewestComments']);
Route::get('/get-upvoted-comments/{id}', [PostAjaxController::class, 'getUpvotedComments']);
Route::get('/get-seller-comments/{id}', [PostAjaxController::class, 'getSellerComments']);
Route::get('/get-bids-comments/{id}', [PostAjaxController::class, 'getBidsComments']);
Route::get('/add-upvote/{id}', [PostAjaxController::class, 'addUpvote']);