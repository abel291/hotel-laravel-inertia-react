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
            $table->tinyInteger('quantity')->default(0);
            $table->decimal('price', 10, 2)->default(0);
            $table->boolean('active')->default(1);
            // $table->tinyInteger('beds')->default(0);
            // $table->tinyInteger('type_beds')->default(0);
            $table->tinyInteger('adults')->default(0);
            $table->tinyInteger('kids')->default(0)->nullable();
            $table->string('img');
            $table->string('thumb');
            $table->boolean('home')->default(0);
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
