<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;

// Login route
Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

// User login route
Route::post('/login', [UserController::class, 'userLogin']);
Route::post('/register', [UserController::class, 'userRegister']);

// Admin user page route
Route::get('/adminpage', [FileController::class, 'showFileAdmin'])->middleware('admin')->name('adminpage');
Route::get('/userpage', [FileController::class, 'showFileUser'])->middleware('user')->name('userpage');

// Upload route
Route::get('/upload', [FileController::class, 'showcategory'])->name('upload');
Route::post('/upload', [FileController::class, 'upload']);

// Route::get('/download{fileid}', [FileController::class, 'downloadfile'])->name('download');
Route::get('/download/{fileid}', [FileController::class, 'download'])->name('file.download');

Route::get('/changePassword', [UserController::class,'userChangePassword']);

Route::get('/userManagement', [UserController::class,'userManagement']);