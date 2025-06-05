<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
})->name("home");
Route::get('/singup', function() {
return view("singup");
})-> name('singup');
Route::post('/register', [HomeController::class, 'register'])->name('register.submit');
// نمایش فرم ورود
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// پردازش ورود (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
// Routeهای محافظت‌شده (فقط برای کاربران لاگین‌شده)
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/roler', [AuthController::class, 'roler'])->name('roler');
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/addrequest', [UserController::class ,'addrequest'])->name('user.addrequest');
    Route::post('/user/storerequest/', [UserController::class ,'storerequest'])->name('user.storerequest');
    Route::get('/user/editrequest/{id}', [UserController::class ,'editrequest'])->name('user.editrequest');
    Route::post('/user/updaterequest/', [UserController::class ,'updaterequest'])->name('user.updaterequest');
    Route::get('/user/deleterequest/{id}', [UserController::class ,'deleterequest'])->name('user.deleterequest');







    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/submits', [AdminController::class, 'dashboardsubmit'])->name('admin.dashboardsubmit');
    Route::get('/admin/checks', [AdminController::class, 'dashboardcheck'])->name('admin.dashboardchek');
    Route::get('/admin/epointmets', [AdminController::class, 'dashboardepointment'])->name('admin.dashboardepointmet');
    Route::post('/admin/userdetail/{id}', [AdminController::class ,'userdetail'])->name('admin.userdetail');
    Route::post('/admin/epointment/{id}', [AdminController::class ,'epointment'])->name('admin.epointment');
    Route::post('/admin/storeprofile', [AdminController::class ,'storeprofile'])->name('admin.storerequest');
    Route::get('/admin/addprofile', [AdminController::class ,'addprofile'])->name('admin.addprofile');

});

