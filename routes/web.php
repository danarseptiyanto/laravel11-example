<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\ExportCsvController;

//
Route::get('/', [HomepageController::class, 'index'])->name('homepage');
// Route::get('/export/{status}', [HomepageController::class, 'export'])->name('homepage.exportcsv');
Route::post('/export', [ExportCsvController::class, 'export'])->name('homepage.exportcsv');
Route::get('/create', [CreateController::class, 'index'])->middleware('auth')->name('create');
Route::post('/create', [CreateController::class, 'store'])->middleware('auth');
Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');
Route::delete('/detail/{id}', [DetailController::class, 'delete'])->middleware('auth')->name('detail.delete');
Route::get('/detail/edit/{id}', [EditController::class, 'index'])->middleware('auth')->name('detail.edit');
Route::put('/detail/edit/{id}', [EditController::class, 'store'])->middleware('auth');


// auth
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('auth.register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('auth.login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/logout', [LogoutController::class, 'logout'])->name('auth.logout');