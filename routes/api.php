<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HostawayController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth.mock')->group(function () {
    Route::get('/reviews/hostaway', [HostawayController::class, 'syncReviews']);
    Route::get('/reviews', [ReviewController::class, 'index']);
    Route::get('/reviews/stats', [ReviewController::class, 'getRatingStats']);
    Route::put('/reviews/toggle/{review}', [ReviewController::class, 'toggleStatus']);
});
