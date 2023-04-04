<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CarController::class, 'list'])->name('home');
Route::get('car/show/{car}', [CarController::class, 'show'])->name('car.show');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('car')->name('car.')->group(function () {
    Route::get('/create', [CarController::class, 'create'])->name('create');
    Route::post('/create', [CarController::class, 'store'])->name('store');
    Route::get('/edit/{car}', [CarController::class, 'edit'])->name('edit');
    Route::put('/edit/{car}', [CarController::class, 'update'])->name('update');
    Route::delete('/delete/{car}', [CarController::class, 'destroy'])->name('delete');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/users', [AdminController::class, 'index'])->name('users');
    Route::get('/edit/{user}', [AdminController::class, 'edit'])->name('edit');
    Route::put('/edit/{user}', [AdminController::class, 'update'])->name('update');

    Route::get('/cars', [AdminController::class, 'cars'])->name('cars');
});

require __DIR__ . '/auth.php';
