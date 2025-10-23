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
        Schema::table('logs', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['user_id']);
            
            // Add new columns for different user types
            $table->string('user_type')->default('user')->after('user_id'); // 'user' or 'supervisor'
            $table->unsignedBigInteger('supervisor_id')->nullable()->after('user_type');
            
            // Make user_id nullable since supervisors won't have a user_id
            $table->unsignedBigInteger('user_id')->nullable()->change();
        });
        
        // Add foreign key constraints
        Schema::table('logs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('supervisor_id')->references('id')->on('supervisors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('logs', function (Blueprint $table) {
            // Drop the new foreign key constraints
            $table->dropForeign(['supervisor_id']);
            $table->dropForeign(['user_id']);
            
            // Remove the new columns
            $table->dropColumn(['user_type', 'supervisor_id']);
            
            // Make user_id not nullable again
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
        });
        
        // Re-add the original foreign key constraint
        Schema::table('logs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
