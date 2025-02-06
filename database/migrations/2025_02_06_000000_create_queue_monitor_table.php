<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('queue_monitor', function (Blueprint $table) {
            $table->id();
            $table->string('job_name');
            $table->string('status')->default('pending');
            $table->integer('attempts')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('queue_monitor');
    }
};
