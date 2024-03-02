<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;


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

// Login route
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
})->name('register');

// User login route
Route::post('/login', [UserController::class, 'userLogin']);
Route::post('/register', [UserController::class, 'userRegister']);


// Admin user page route (dijaga kalo iseng hehe)
Route::get('/adminpage', [FileController::class, 'showFileAdmin'])->middleware('admin')->name('adminpage');
Route::get('/userpage', [UserController::class, 'showFileUser'])->middleware('user')->name('userpage');




