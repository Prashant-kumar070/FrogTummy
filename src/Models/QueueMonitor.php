<?php

namespace Frogtummy\QueueMonitor\Models;

use Illuminate\Database\Eloquent\Model;

class QueueMonitor extends Model
{
    protected $table = 'queue_monitor';
    protected $fillable = ['job_name', 'status', 'attempts'];
}
