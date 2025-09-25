<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('external_id')->nullable()->index();
            $table->string('course_title');
            $table->string('platform_used');
            $table->text('course_description');
            $table->unsignedBigInteger('category_id'); // Foreign key to categories table
            $table->string('level');      // Beginner, Intermediate, Advanced
            $table->date('start_date');
            $table->date('end_date');
            $table->string('resource_person');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade'); // optional: deletes trainings if category is deleted
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
