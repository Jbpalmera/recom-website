<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_initial')->nullable();
            $table->string('last_name');
            $table->string('name_extension')->nullable();
            $table->string('email')->unique();
            $table->string('mobile_no')->nullable();
            $table->string('sex')->nullable();
            $table->string('age_group')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('highest_educational_attainment')->nullable();
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
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
