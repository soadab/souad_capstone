<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DatabaseController;
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


Route::namespace('Front')->group(function(){
    Route::get('/', [HomepageController::class, 'index'])->name('Front.homepage');
});
Route::namespace('Admin')->group(function(){
    Route::get('/dashboard/login', [AuthController::class, 'login'])->name('Admin.login');
    Route::post('/dashboard/login', [AuthController::class, 'doLogin'])->name('Admin.doLogin');

    Route::get('/dashboard/register', [AuthController::class, 'register'])->name('Admin.register');
    Route::post('/dashboard/register', [AuthController::class, 'doRegister'])->name('Admin.doRegister');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('Admin.dashboard')->middleware('auth');
    Route::post('/send-message', [DashboardController::class, 'sendMessage'])->name('Admin.sendMessage');
    Route::get('/download-database', [DatabaseController::class, 'download'])->name('download.database');

    
    // Utiliser la méthode GET pour la déconnexion
    Route::POST('/logout', [AuthController::class, 'logout'])->name('Admin.logout');
});

