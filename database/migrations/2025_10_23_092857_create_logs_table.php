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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('type'); // action type like 'profile_update', 'user_created', 'module_access', etc.
            $table->string('module')->nullable(); // which module the action was performed in
            $table->text('description'); // detailed description of the action
            $table->timestamp('created_on');
            
            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // Indexes for better performance
            $table->index(['user_id', 'created_on']);
            $table->index(['type', 'created_on']);
            $table->index(['module', 'created_on']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};