<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('user');

Route::get('/change-password', [HomeController::class, 'change_pass'])->name('change_pass');
Route::post('/change-password', [HomeController::class, 'change_pass_post'])->name('change_pass_post');

Route::group(['prefix' => 'admin', 'middleware' => ['AdminIsValid','auth']], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin_profile');
    Route::get('staffs', [AdminController::class, 'show_staffs'])->name('show_staffs');
    Route::get('add-staff', [RegisterController::class, 'showRegistrationForm'])->name('add_staff');
    Route::post('add-staff', [RegisterController::class, 'register'])->name('add_staff_post');
    Route::get('edit-staff/{id}', [AdminController::class, 'edit_staff'])->name('edit_staff');
    Route::post('edit-staff', [AdminController::class, 'edit_staff_post'])->name('edit_staff_post');
    Route::get('reset-pass/{id}', [AdminController::class, 'reset_pass'])->name('reset_pass');
    Route::get('staff/delete/{id}', [AdminController::class, 'delete_staff'])->name('delete_staff');
});