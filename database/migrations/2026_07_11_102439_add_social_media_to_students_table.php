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
    Schema::table('students', function (Blueprint $table) {

        $table->string('instagram')->nullable();
        $table->string('github')->nullable();
        $table->string('linkedin')->nullable();
        $table->string('tiktok')->nullable();
        $table->string('website')->nullable();

    });
}

public function down(): void
{
    Schema::table('students', function (Blueprint $table) {

        $table->dropColumn([
            'instagram',
            'github',
            'linkedin',
            'tiktok',
            'website'
        ]);

    });
}
};
