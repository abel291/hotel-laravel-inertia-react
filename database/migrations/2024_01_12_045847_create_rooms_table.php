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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('entry');
            $table->text('description');
            $table->unsignedSmallInteger('quantity')->default(1);
            $table->unsignedDecimal('price', 10, 2)->default(0); //price per 1 night
            $table->boolean('active')->default(1);
            $table->unsignedTinyInteger('adults')->default(0);
            $table->unsignedTinyInteger('kids')->default(0)->nullable();
            $table->string('img');
            $table->string('thumb');
            $table->boolean('home')->default(false);
            $table->boolean('about')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
