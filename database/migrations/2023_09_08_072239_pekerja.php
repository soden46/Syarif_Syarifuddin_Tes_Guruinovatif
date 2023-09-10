<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pekerja', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('client');
            $table->string('leader_name');
            $table->string('leader_mail');
            $table->string('leader_photo');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('progress');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerja');
    }
};
