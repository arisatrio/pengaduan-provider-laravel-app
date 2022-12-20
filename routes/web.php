<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\RolePermissionController;
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

Route::get('/', function () {
    return view('home');
})->name('public-home');

Route::resource('tambah-pengaduan', App\Http\Controllers\PengaduanController::class)->only(['create', 'store']);
Route::resource('cek-pengaduan', App\Http\Controllers\CekPengaduanController::class)->only(['index']);


Route::get('/kontak-kami', function () {
    return view('contact');
})->name('kontak-kami');

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    // COMPLAINT
    Route::prefix('transaction')->group(function () {
        Route::resource('new-complain', App\Http\Controllers\Admin\ComplaintController::class);
        Route::put('/reply-complain/{id}', App\Http\Controllers\Admin\ReplyComplaintController::class)->name('reply-complain');
        Route::put('/mark-done-complain/{id}', App\Http\Controllers\Admin\MarkDoneComplaintController::class)->name('mark-done-complain');
        Route::resource('report-complain', App\Http\Controllers\Admin\ReportComplaintController::class);
        Route::get('/show/forward-complain/{id}', App\Http\Controllers\Admin\ForwardRepliesController::class)->name('forward-replies');
    });

    // MASTER DATA
    Route::prefix('master-data')->group(function () {
        Route::resource('category' ,App\Http\Controllers\Admin\CategoryController::class);
    });
    //USER MANAGEMENT
    Route::prefix('user-management')->group(function () {
        Route::resource('/users', App\Http\Controllers\Admin\UserController::class)->except(['create']);
        Route::resource('roles', App\Http\Controllers\Admin\RoleController::class)->except(['create', 'update']);
        Route::resource('permission', App\Http\Controllers\Admin\PermissionController::class)->except(['create', 'update']);
        Route::get('role-permission', [RolePermissionController::class, 'index']);
    });
    Route::resource('/profile', App\Http\Controllers\ProfileController::class)->except(['create','store','show','edit','destroy']);
    
});
