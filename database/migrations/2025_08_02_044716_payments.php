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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');      
            $table->foreignId('course_id')->constrained()->onDelete('cascade');    
            // $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable()->unique();
            $table->decimal('amount', 10, 2);              
            // $table->string('currency', 3)->default('USD'); 
            // $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->timestamp('paid_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
