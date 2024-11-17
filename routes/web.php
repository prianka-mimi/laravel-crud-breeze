<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\RecycleBinController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('dashboard',[AdminController::class,'index'])->name('dashboard');
Route::get('log-out',[AdminController::class,'logout']);

Route::get('dashboard/user',[UserController::class,'index']);
Route::get('dashboard/user/add',[UserController::class,'add']);
Route::get('dashboard/user/view/{slug}',[UserController::class,'view']);
Route::get('dashboard/user/edit/{slug}',[UserController::class,'edit']);
Route::post('dashboard/user/submit',[UserController::class,'insert']);
Route::post('dashboard/user/update',[UserController::class,'update']);
Route::post('dashboard/user/softdelete',[UserController::class,'softdelete']);
Route::post('dashboard/user/restore',[UserController::class,'restore']);
Route::post('dashboard/user/delete',[UserController::class,'delete']);

Route::get('dashboard/banner',[BannerController::class,'index']);
Route::get('dashboard/banner/add',[BannerController::class,'add']);
Route::get('dashboard/banner/view/{slug}',[BannerController::class,'view']);
Route::get('dashboard/banner/edit/{slug}',[BannerController::class,'edit']);
Route::post('dashboard/banner/submit',[BannerController::class,'insert']);
Route::post('dashboard/banner/update',[BannerController::class,'update']);
Route::post('dashboard/banner/softdelete/{slug}',[BannerController::class,'softdelete']);
Route::post('dashboard/banner/restore/{slug}',[BannerController::class,'restore']);
Route::post('dashboard/banner/delete/{slug}',[BannerController::class,'delete']);

Route::get('dashboard/recyclebin',[RecycleBinController::class,'index'])->name('recyclebin');
require __DIR__.'/auth.php';
