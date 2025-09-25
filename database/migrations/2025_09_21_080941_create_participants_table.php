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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name');
            $table->string('middle_initial')->nullable();
            $table->string('last_name');
            $table->string('name_extension')->nullable();
            $table->string('email');
            $table->string('mobile_no')->nullable();
            $table->string('course_title')->nullable();

            $table->timestamps();

            $table->unique(['user_id', 'course_title']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
