<?php

use App\Http\Controllers\Api\Auth\AuthenticateTokenController;
use App\Http\Controllers\Api\Auth\RegisteredUserController;
use App\Http\Controllers\Api\LinkController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::post('/register', [RegisteredUserController::class, 'store'])->name('api.register');
Route::post('/login', [AuthenticateTokenController::class, 'store'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthenticateTokenController::class, 'destroy'])->name('api.logout');
    Route::get('/links', [LinkController::class, 'index']);
    Route::post('/links', [LinkController::class, 'store']);
    Route::delete('/links/{link:hash}', [LinkController::class, 'remove']);

});

// Route::post('/links', [LinkController::class, 'store'])->name('links.store');
// Route::delete('/links/{id}', [LinkController::class, 'remove'])->name('links.remove');
