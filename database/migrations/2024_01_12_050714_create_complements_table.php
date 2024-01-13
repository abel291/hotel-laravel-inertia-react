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
        Schema::create('complements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon');
            $table->decimal('price', 10, 2)->default(0);
            $table->enum('type_price', ['reservation', 'night']);
            $table->text('entry');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complements');
    }
};
