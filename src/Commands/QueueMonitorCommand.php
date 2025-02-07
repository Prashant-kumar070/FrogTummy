<?php

namespace QBeacon\QueueMonitor\Commands;

use Illuminate\Console\Command;

class QueueMonitorCommand extends Command
{
    protected $signature = 'queue-monitor:show';
    protected $description = 'Display queue monitor status';

    public function handle()
    {
        $this->info('Queue Monitor is active.');
    }
}
