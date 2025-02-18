<?php

use GuzzleHttp\Middleware;
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




Route::get('/', [\App\Http\Controllers\Home::class, 'index'])->middleware('checkLogin');
Route::get('/guest', [\App\Http\Controllers\Home::class, 'index']);
Route::post('/category', [\App\Http\Controllers\Home::class, 'category'])->name('/category');

Route::get('/login', [\App\Http\Controllers\LoginRegisterController::class,'log']);
Route::post('/login', [\App\Http\Controllers\LoginRegisterController::class,'Login'])->name('/login');

Route::get('/register', [\App\Http\Controllers\LoginRegisterController::class,'reg']);
Route::post('/register', [\App\Http\Controllers\LoginRegisterController::class, 'create'])->name("/register");

Route::get('/logout',[\App\Http\Controllers\LoginRegisterController::class, 'logout']);

Route::get('/search',[\App\Http\Controllers\SearchController::class,'index'])->middleware('user');
Route::post('/search', [\App\Http\Controllers\SearchController::class,'search'])->name('/search')->middleware('user');
Route::post('/search/filter', [\App\Http\Controllers\SearchController::class, 'submitForm'])->name('submit')->middleware('user');


Route::get('/foodDetail',[\App\Http\Controllers\FoodDetail::class,'index']);
Route::get('/foodDetail/{id}',[\App\Http\Controllers\FoodDetail::class,'info']);

Route::get('/cart',[\App\Http\Controllers\CartController::class,'index'])->middleware('user');
Route::post('/cart{id}',[\App\Http\Controllers\CartController::class,'addCart'])->name('addCart')->middleware('user');
Route::delete('/cart{food_id}',[\App\Http\Controllers\CartController::class,'destroy'])->name('remove')->middleware('user');

Route::get('/editProfile/{user}/edit',[\App\Http\Controllers\UserController::class,'index'])->name('edit')->middleware('checkLogin');
Route::put('/editProfile/{user}',[\App\Http\Controllers\UserController::class, 'update'])->name('update')->middleware('checkLogin');

Route::get('/checkout',[\App\Http\Controllers\CheckOutController::class,'index'])->middleware('user');
Route::post('/checkout',[\App\Http\Controllers\CheckOutController::class,'checkout'])->name('checkout')->middleware('user');

Route::get('/transaction',[\App\Http\Controllers\TransactionController::class,'index'])->middleware('user');





Route::get('/addFood',[\App\Http\Controllers\FoodController::class,'index'])->middleware('admin');
Route::post('/addFood', [\App\Http\Controllers\FoodController::class, 'create'])->name('addFood')->middleware('admin');

Route::get('/manageFood',[\App\Http\Controllers\ManageController::class,'index'])->middleware('admin');
Route::post('/manageFood', [\App\Http\Controllers\ManageController::class,'search'])->name('/manageFood')->middleware('admin');
Route::post('/manage/filter', [\App\Http\Controllers\ManageController::class, 'submitForm'])->name('submitManage')->middleware('admin');

Route::get('/updateFood/{id}/edit', [\App\Http\Controllers\FoodController::class, 'edit'])->name('editFood')->middleware('admin');
Route::put('/updateFood/{id}', [\App\Http\Controllers\FoodController::class, 'update'])->name('updateFood')->middleware('admin');
Route::delete('/deletefood/{id}', [\App\Http\Controllers\FoodController::class, 'destroy'])->name('destroy')->middleware('admin');



