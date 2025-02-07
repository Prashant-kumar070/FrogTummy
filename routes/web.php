<?php

use Illuminate\Support\Facades\Route;
use QBeacon\QueueMonitor\Http\Controllers\QueueMonitorController;

Route::get('/queue-monitor', [QueueMonitorController::class, 'index']);
Route::post('/queue-monitor/retry/{id}', [QueueMonitorController::class, 'retry']);
