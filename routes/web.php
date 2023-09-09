<?php

use App\Models\Reimburse;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReimburseController;
use League\CommonMark\Extension\SmartPunct\DashParser;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');;
Route::post('/', [LoginController::class, 'authenticate']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/dashboard/users', UserController::class)->middleware(['auth', 'admin']);
Route::put('/dashboard/reimburses/{reimburse:id}/action', [ReimburseController::class, 'action']);
Route::resource('/dashboard/reimburses', ReimburseController::class)->middleware('auth');
Route::resource('/dashboard/statuses', StatusController::class)->middleware('auth');
Route::resource('/dashboard/levels', LevelController::class)->middleware('auth');
Route::get('/profile/{user:id}', [DashboardController::class, 'profile'])->middleware('auth');
Route::get('/profile/{user:id}/edit', [DashboardController::class, 'editprofile'])->middleware('auth');
Route::put('/profile/{user:id}', [DashboardController::class, 'updateprofile'])->middleware('auth');
