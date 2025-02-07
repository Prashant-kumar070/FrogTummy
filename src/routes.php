<?php
use QBeacon\QueueMonitor\Models\QueueMonitor;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/queue-monitor', function () {
    $jobs = QueueMonitor::orderBy('created_at', 'desc')->get();
    return view('queue-monitor::dashboard', compact('jobs'));
});

Route::post('/queue-monitor/retry/{id}', function ($id) {
    Artisan::call("queue:retry $id");
    return redirect('/queue-monitor')->with('success', 'Job retried successfully!');
});
