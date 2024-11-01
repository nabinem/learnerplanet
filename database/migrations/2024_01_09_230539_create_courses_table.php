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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->index('title');
            $table->string('short_desc', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('disclosure')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('trailer')->nullable();
            $table->string('trailer_cover')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
