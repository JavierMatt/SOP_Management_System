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
// Route::get('/toversioning/{filename}/{catid}',eController::class,'toVersioning'])->name('toversioning');

Route::get('/versioning/{fileid}',[FileController::class,'toVersioning'])->middleware('admin')->name('toversioning');
Route::get('/update/{fileid}',[FileController::class,'toUpdate'])->middleware('admin')->name('toUpdate');
Route::post('/update/{fileid}',[FileController::class,'update'])->middleware('admin')->name('update');

// Route for searching
Route::get('/adminpage/search', [FileController::class,'search'])->name('search');
// Route::get('/userpage/search', [Filecontroller::class, 'search2'])->name('search2');
Route::get('/userpage/search', [FileController::class,'searchUser'])->middleware('user')->name('searchUser');
Route::get('/userpage/logout', [UserController::class,'logout'])->name('logout');


// Route for filtering
Route::get('/adminpage/filter', [FileController::class,'filter'])->name('filter');
// Route::get('/userpage/search', [FileController::class,'filter2'])->name('filter2');
Route::get('/userpage/filter', [FileController::class,'filterUser'])->middleware('user')->name('filterUser');

// ROute for userManagement
Route::get('/userManagement', [FileController::class,'userManagement'])->middleware('admin');
Route::get('/userManagement/search', [FileController::class,'searchManagement'])->name('searchManagement');
Route::get('/userManagement/filter', [FileController::class,'filterManagement'])->name('filterManagement');
Route::delete('/userManagement/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
Route::get('/userManagement/{id}', [UserController::class, 'switchRole'])->name('user.switchRole');


//Route for Logout
Route::get('/adminpage/logout', [UserController::class,'logout'])->name('logout');

// Route for change password
Route::get('/changePass', [UserController::class, 'showForm'])->middleware('admin')->name('changePass');
Route::post('/changePass', [UserController::class, 'changePassword']);