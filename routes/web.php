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
Route::get('/upload', [FileController::class, 'showcategory'])->middleware('admin');
Route::post('/upload', [FileController::class, 'upload'])->middleware('admin')->name('upload');

// Route::get('/download{fileid}', [FileController::class, 'downloadfile'])->name('download');
Route::get('/download/{fileid}', [FileController::class, 'download'])->name('file.download');
// Route::get('/toversioning/{filename}/{catid}',[FileController::class,'toVersioning'])->name('toversioning');

Route::get('/versioning/{fileid}',[FileController::class,'toVersioning'])->name('toversioning');
Route::get('/update/{fileid}',[FileController::class,'toUpdate'])->middleware('admin')->name('toUpdate');
Route::post('/update/{fileid}',[FileController::class,'update'])->middleware('admin')->name('update');

// Route for searching
Route::get('/adminpage/search', [FileController::class,'search'])->name('search');

// Route for filtering
Route::get('/adminpage/filter', [FileController::class,'filter'])->name('filter');

Route::get('/changePassword', [UserController::class,'userChangePassword']);

Route::get('/userManagement', [FIleController::class,'userManagement']);

//Route Filter and Seacrh di user
Route::get('/userpage/filter', [UserController::class,'filter'])->name('filter');
Route::get('/userpage/search', [UserController::class,'search'])->name('search');