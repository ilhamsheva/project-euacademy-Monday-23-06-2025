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
        Schema::create('event_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('name');
            $table->text('description')->nullable()->default('text');
            $table->integer('duration');
            $table->date('start');
            $table->date('end');
            $table->string('category');
            $table->decimal('price', 10, 2);
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_courses');
    }
};
