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
        Schema::table('users', function (Blueprint $table) {
            $table->string('company_name')->nullable();
            $table->string('company_location')->nullable();
            $table->string('company_ntn_number')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_print_logo')->nullable();
            $table->text('company_bio')->nullable();
            $table->string('company_country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'company_name',
                'company_location', 
                'company_ntn_number',
                'company_logo',
                'company_print_logo',
                'company_bio',
                'company_country'
            ]);
        });
    }
};