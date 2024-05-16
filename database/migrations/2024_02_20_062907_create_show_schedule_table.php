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
        Schema::create('show_schedule', function (Blueprint $table) {
            $table->id();
            $table->text('show_banner')->nullable();
            $table->text('show_name')->nullable();
            $table->text('rj_name')->nullable();
            $table->text('start_time')->nullable();
            $table->text('end_time')->nullable();
            $table->text('show_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_schedule');
    }
};
