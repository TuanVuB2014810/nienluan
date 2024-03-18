<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TeacherrController;
use App\Http\Controllers\HomeController;
/*
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



// Route::group(['prefix' => 'admin'], function() {
//     Route::get('/', [AdminController::class, 'index'])->name('admin.index');
// });
Route::get('/', [HomeController::class, 'index'])->name('pages.index');

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check_login']);

// Route::get('/admin/change-password', [AdminController::class, 'change_password'])->name('admin.change_password');
// Route::post('/admin/change-password', [AdminController::class, 'check_change_password']);

// Route::get('/admin/forgot-password', [AdminController::class, 'forgot_password'])->name('admin.forgot_password');
// Route::post('/admin/forgot-password', [AdminController::class, 'check_forgot_password']);

// Route::get('/admin/reset-password/{token}', [AdminController::class, 'reset_password'])->name('admin.reset_password');
// Route::post('/admin/reset-password/{token}', [AdminController::class, 'check_reset_password']);

Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'check_register']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::resource('major', MajorController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('account', AccountController::class);
    Route::resource('student', StudentController::class);
    Route::resource('teacher', TeacherController::class);
    Route::resource('teacherr', TeacherrController::class);
});

