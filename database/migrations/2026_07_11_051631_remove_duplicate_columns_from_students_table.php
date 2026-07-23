<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {

            $table->dropColumn([
                'hobby',
                'dream',
            ]);

        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {

            $table->string('hobby')->nullable();

            $table->string('dream')->nullable();

        });
    }
};