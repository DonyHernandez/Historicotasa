<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TasaBcvController;
use Illuminate\Support\Facades\Route;
use App\Livewire\UserTable;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tasaind', [TasaBcvController::class, 'index'])->name('index');
Route::get('/user-table', [TasaBcvController::class, 'usuario'])->name('user.table')->middleware('auth');
// Route::get('/tasaind/tasa', [TasaBcvController::class, 'ObtenerTasaBCV'])->name('tasa');

// Route::get('/user-table', [UserTable::class, 'render'])->name('user.table')->middleware('auth');

// Route::get('/user-table', UserTable::class)->name('user.table')->middleware('auth');




require __DIR__.'/auth.php';
