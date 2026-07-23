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
    Schema::create('class_profiles', function (Blueprint $table) {
        $table->id();

        $table->string('class_name');
        $table->string('slogan')->nullable();
        $table->string('logo')->nullable();

        $table->text('history')->nullable();
        $table->text('vision')->nullable();
        $table->text('mission')->nullable();
        $table->text('motto')->nullable();
        $table->text('logo_philosophy')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_profiles');
    }
};
