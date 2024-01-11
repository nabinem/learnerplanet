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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('module_id');
            $table->string('title', 100);
            $table->string('short_desc')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('sort_order');
            $table->enum('status', ['draft', 'published', 'locked', 'drip'])->default('draft');
            $table->timestamp('start_time')->nullable();
            $table->string('media')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
