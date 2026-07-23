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
    Schema::create('duty_schedules', function (Blueprint $table) {

        $table->id();

        $table->enum('day', [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat'
        ]);

        $table->foreignId('student_1')->constrained('students')->cascadeOnDelete();
        $table->foreignId('student_2')->constrained('students')->cascadeOnDelete();
        $table->foreignId('student_3')->constrained('students')->cascadeOnDelete();
        $table->foreignId('student_4')->constrained('students')->cascadeOnDelete();
        $table->foreignId('student_5')->constrained('students')->cascadeOnDelete();

        $table->timestamps();

    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    Schema::dropIfExists('duty_schedules');
    }
};
