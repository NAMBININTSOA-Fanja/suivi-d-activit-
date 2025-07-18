<?php
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardStatsController;
use Illuminate\Routing\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logs', [ActivityLogController::class, 'index']);

    Route::get('/stats', [DashboardStatsController::class, 'index']);

    Route::get('/applications', [ApplicationController::class, 'index']);

    Route::get('/export/logs', [ActivityLogController::class, 'export']);
});

Route::post('/logs', [ActivityLogController::class, 'store'])->middleware('auth.apikey');