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
        Schema::table('user_infos', function (Blueprint $table) {
            // Remove old fields that are no longer needed
            $table->dropColumn(['country', 'passport', 'date_of_birth', 'state']);
            
            // Add new fields
            $table->date('joining_date')->nullable()->after('department_id');
            $table->string('bank_account_title')->nullable()->after('joining_date');
            $table->string('bank_account_number')->nullable()->after('bank_account_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_infos', function (Blueprint $table) {
            // Add back the old fields
            $table->string('country')->nullable();
            $table->string('passport')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('state')->nullable();
            
            // Remove the new fields
            $table->dropColumn(['joining_date', 'bank_account_title', 'bank_account_number']);
        });
    }
};
