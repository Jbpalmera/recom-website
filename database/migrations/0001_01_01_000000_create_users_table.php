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
        // Users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->string('first_name');
            $table->string('username')->unique();
            $table->string('middle_initial')->nullable();
            $table->string('last_name')->nullable();
            $table->string('name_extension')->nullable();
            $table->string('gender')->nullable();
            $table->string('age_group')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('highest_educational_background')->nullable();
            $table->string('sector_group')->nullable();
            $table->boolean('senior_citizen')->default(false);
            $table->boolean('differently_abled')->default(false);
            $table->boolean('solo_parent')->default(false);
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->string('city_municipality')->nullable();
            $table->string('agency')->nullable();
            $table->string('office_affiliation')->nullable();
            $table->string('designation')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Laravel sessions table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // Password reset tokens table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('users');
    }
};
