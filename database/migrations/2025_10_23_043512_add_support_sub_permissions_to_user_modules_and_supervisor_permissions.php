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
        // Add User Support sub-permissions to user_modules table
        Schema::table('user_modules', function (Blueprint $table) {
            $table->boolean('user_support_can_view')->default(false)->after('can_access_dealer_support');
            $table->boolean('user_support_can_update')->default(false)->after('user_support_can_view');
            $table->boolean('user_support_can_expiry_update')->default(false)->after('user_support_can_update');
            $table->boolean('user_support_can_package_change')->default(false)->after('user_support_can_expiry_update');
            $table->boolean('user_support_can_add_days')->default(false)->after('user_support_can_package_change');
            
            $table->boolean('dealer_support_can_view')->default(false)->after('user_support_can_add_days');
            $table->boolean('dealer_support_can_update')->default(false)->after('dealer_support_can_view');
            $table->boolean('dealer_support_can_expiry_update')->default(false)->after('dealer_support_can_update');
            $table->boolean('dealer_support_can_package_change')->default(false)->after('dealer_support_can_expiry_update');
            $table->boolean('dealer_support_can_add_days')->default(false)->after('dealer_support_can_package_change');
        });

        // Add User Support sub-permissions to supervisor_permissions table
        Schema::table('supervisor_permissions', function (Blueprint $table) {
            $table->boolean('user_support_can_view')->default(false)->after('can_access_dealer_support');
            $table->boolean('user_support_can_update')->default(false)->after('user_support_can_view');
            $table->boolean('user_support_can_expiry_update')->default(false)->after('user_support_can_update');
            $table->boolean('user_support_can_package_change')->default(false)->after('user_support_can_expiry_update');
            $table->boolean('user_support_can_add_days')->default(false)->after('user_support_can_package_change');
            
            $table->boolean('dealer_support_can_view')->default(false)->after('user_support_can_add_days');
            $table->boolean('dealer_support_can_update')->default(false)->after('dealer_support_can_view');
            $table->boolean('dealer_support_can_expiry_update')->default(false)->after('dealer_support_can_update');
            $table->boolean('dealer_support_can_package_change')->default(false)->after('dealer_support_can_expiry_update');
            $table->boolean('dealer_support_can_add_days')->default(false)->after('dealer_support_can_package_change');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove User Support sub-permissions from user_modules table
        Schema::table('user_modules', function (Blueprint $table) {
            $table->dropColumn([
                'user_support_can_view',
                'user_support_can_update', 
                'user_support_can_expiry_update',
                'user_support_can_package_change',
                'user_support_can_add_days',
                'dealer_support_can_view',
                'dealer_support_can_update',
                'dealer_support_can_expiry_update', 
                'dealer_support_can_package_change',
                'dealer_support_can_add_days'
            ]);
        });

        // Remove User Support sub-permissions from supervisor_permissions table
        Schema::table('supervisor_permissions', function (Blueprint $table) {
            $table->dropColumn([
                'user_support_can_view',
                'user_support_can_update',
                'user_support_can_expiry_update', 
                'user_support_can_package_change',
                'user_support_can_add_days',
                'dealer_support_can_view',
                'dealer_support_can_update',
                'dealer_support_can_expiry_update',
                'dealer_support_can_package_change', 
                'dealer_support_can_add_days'
            ]);
        });
    }
};