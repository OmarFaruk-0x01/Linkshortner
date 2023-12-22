<?php

use App\Http\Controllers\Web\LinkController;
use App\Http\Controllers\Web\ProfileController;
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
require __DIR__ . '/auth.php';

Route::get('/', [LinkController::class, 'index'])->name('links.index');

Route::middleware('auth')->group(function () {
    Route::post('/links', [LinkController::class, 'store'])->name('links.store');
    Route::delete('/links/{id}', [LinkController::class, 'remove'])->name('links.remove');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/{link:hash}', [LinkController::class, 'show'])->name('links.show');
