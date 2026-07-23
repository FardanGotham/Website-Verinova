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
    Schema::create('class_infos', function (Blueprint $table) {

        $table->id();

        $table->string('title');

        $table->enum('category',[
            'Tugas',
            'Pengumuman',
            'Ulangan',
            'Agenda',
            'Event'
        ]);

        $table->string('teacher')->nullable();

        $table->date('deadline')->nullable();

        $table->text('description');

        $table->string('attachment')->nullable();

        $table->enum('priority',[
            'Normal',
            'Penting',
            'Mendesak'
        ])->default('Normal');

        $table->enum('status',[
            'Aktif',
            'Selesai'
        ])->default('Aktif');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_infos');
    }
};
