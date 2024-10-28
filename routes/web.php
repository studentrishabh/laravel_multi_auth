<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// auth route 

Route::get('/',[LoginController::class,'index'])->name('account.login');
Route::post('/account/authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
Route::get('/account/dashboard',[DashboardController::class,'index'])->name('account.dashboard');
Route::get('/account/register',[LoginController::class,'register'])->name('account.register');
Route::post('/account/process-register',[LoginController::class,'processRegister'])->name('account.processRegister');
Route::get('/account/logout',[LoginController::class,'logout'])->name('account.logout');

// crud operation route ====

// Route::get('users', [UserController::class, 'index'])->name('users.index');
// Route::get('users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('users', [UserController::class, 'store'])->name('users.store');
// Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
// Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
// Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
