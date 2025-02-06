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
         if ($this->app->runningInConsole()) {
            $this->commands([
                QueueMonitorCommand::class,
            ]);

            // Publish Config
            $this->publishes([
                __DIR__.'/../config/queue-monitor.php' => config_path('queue-monitor.php'),
            ], 'config');
        }

        // ✅ Load Package Routes Automatically
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // ✅ Load Package Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // ✅ Load Package Views
        $this->loadViewsFrom(__DIR__.'/../views', 'queue-monitor');
    }
}
