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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('entry');
            $table->string('img');
            $table->text('description');
            $table->string('seo_title');
            $table->string('seo_desc');
            $table->string('type')->index();
            $table->enum('lang', ['es', 'en', 'bp'])->default('es'); //bp -> Portuguese
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
