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
        // Add SUPPORT permissions to user_modules table
        Schema::table('user_modules', function (Blueprint $table) {
            $table->boolean('can_access_user_support')->default(false)->after('can_manage_salary_payments');
            $table->boolean('can_access_dealer_support')->default(false)->after('can_access_user_support');
        });

        // Add SUPPORT permissions to supervisor_permissions table
        Schema::table('supervisor_permissions', function (Blueprint $table) {
            $table->boolean('can_access_user_support')->default(false)->after('can_manage_salary_payments');
            $table->boolean('can_access_dealer_support')->default(false)->after('can_access_user_support');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove SUPPORT permissions from user_modules table
        Schema::table('user_modules', function (Blueprint $table) {
            $table->dropColumn(['can_access_user_support', 'can_access_dealer_support']);
        });

        // Remove SUPPORT permissions from supervisor_permissions table
        Schema::table('supervisor_permissions', function (Blueprint $table) {
            $table->dropColumn(['can_access_user_support', 'can_access_dealer_support']);
        });
    }
};
