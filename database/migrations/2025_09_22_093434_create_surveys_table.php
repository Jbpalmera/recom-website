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
  Schema::create('surveys', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');

    // ✅ Course Preferences (checkboxes)
    $table->boolean('web_development')->default(0);
    $table->boolean('mobile_development')->default(0);
    $table->boolean('data_science')->default(0);
    $table->boolean('cybersecurity')->default(0);
    $table->boolean('ai_machine_learning')->default(0);
    $table->boolean('digital_marketing')->default(0);
    $table->boolean('cloud_computing')->default(0);
    $table->boolean('ui_ux_design')->default(0);

    // ✅ Single-selects
    $table->string('primary_goal')->nullable();
    $table->string('course_type')->nullable();

    // ✅ Learning Preferences
    $table->string('frequency')->nullable();
    $table->string('preferred_time')->nullable();

    // Flattened checkboxes (learning_format)
    $table->boolean('learning_format_online_live')->default(0);
    $table->boolean('learning_format_online_recorded')->default(0);
    $table->boolean('learning_format_face_to_face')->default(0);
    $table->boolean('learning_format_hybrid')->default(0);
    $table->boolean('learning_format_workshop')->default(0);
    $table->boolean('learning_format_bootcamp')->default(0);

    $table->string('course_duration')->nullable();

    // ✅ Hobbies (flattened checkboxes)
    $table->boolean('hobby_gaming')->default(0);
    $table->boolean('hobby_photography')->default(0);
    $table->boolean('hobby_reading')->default(0);
    $table->boolean('hobby_music')->default(0);
    $table->boolean('hobby_sports')->default(0);
    $table->boolean('hobby_traveling')->default(0);
    $table->boolean('hobby_cooking')->default(0);
    $table->boolean('hobby_art_design')->default(0);
    $table->boolean('hobby_writing')->default(0);

    // ✅ Other fields
    $table->text('additional_comments')->nullable();
    $table->boolean('newsletter')->default(0);

    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
