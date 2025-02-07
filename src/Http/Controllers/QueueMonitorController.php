<?php

namespace QBeacon\QueueMonitor\Http\Controllers;

use QBeacon\QueueMonitor\Models\QueueMonitor;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class QueueMonitorController
{
    public function index()
    {
        $jobs = QueueMonitor::orderBy('created_at', 'desc')->get();
        return view('queue-monitor::dashboard', compact('jobs'));
    }

    public function retry($id)
    {
        Artisan::call("queue:retry $id");
        return redirect('/queue-monitor')->with('success', 'Job retried successfully!');
    }
}
