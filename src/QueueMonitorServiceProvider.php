<?php

namespace Frogtummy\QueueMonitor;

use Illuminate\Support\ServiceProvider;
use Frogtummy\QueueMonitor\Commands\QueueMonitorCommand; // Import the command

class QueueMonitorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/queue-monitor.php', 'queue-monitor');
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'queue-monitor'); // Auto-load views
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        if ($this->app->runningInConsole()) {
            $this->commands([
                QueueMonitorCommand::class,
            ]);
        }
    }
    
}
