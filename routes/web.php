<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SearchBookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookCheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/signup', [UserController::class, 'getSignup']);
Route::post('/signup', [UserController::class, 'postSignup']);
	
Route::get('/login', [UserController::class, 'getLogin']);
Route::post('/login', [UserController::class, 'postLogin']);
Route::post('/logout', [UserController::class, 'getLogout']);	

Route::get('/', [BookController::class, 'index']);
Route::get('/book/create', [BookController::class, 'create']);
Route::post('/book', [BookController::class, 'store']);
Route::get('/book/edit/{book}', [BookController::class, 'edit']);
Route::put('/book/update/{book}', [BookController::class, 'update']);
Route::delete('/book/delete/{book}', [BookController::class, 'destroy']);
Route::get('/book/{book}', [BookController::class, 'show']);

//Route::resource('book', [BookController::class]);

Route::get('/search', [SearchBookController::class, 'index'])->name('search');
//Route::post('/search/{books}', [SearchBookController::class, 'searchresults']);

Route::post('/checkout/{book}', [BookCheckoutController::class, 'checkout']);
Route::post('/checkin/{book}', [BookCheckoutController::class, 'checkin']);

Route::get('/review/create', [ReviewController::class, 'create']);
Route::post('/review', [ReviewController::class, 'store']);
