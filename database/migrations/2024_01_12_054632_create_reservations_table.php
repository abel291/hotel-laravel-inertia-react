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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->index();
            $table->date('start_date');
            $table->date('end_date');
            $table->tinyInteger('adults')->default(0);
            $table->tinyInteger('kids')->default(0)->nullable();
            $table->unsignedInteger('quantity')->default(1);
            $table->string('check_in', 8)->default('02:30 PM')->nullable();
            $table->text('special_request')->nullable();
            $table->string('state')->default('successful');
            $table->tinyInteger('nights');
            $table->unsignedDecimal('price');
            $table->unsignedDecimal('sub_total', 12, 2);
            $table->unsignedFloat('tax_amount');
            $table->unsignedTinyInteger('tax_percent');
            $table->unsignedDecimal('total', 12, 2);
            $table->json('data');

            $table->json('offer')->nullable();
            // $table->json('room_data')->nullable();
            // $table->json('user_data')->nullable();
            // $table->json('complements_data')->nullable();
            // $table->json('refund_data')->nullable();

            $table->foreignId('room_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('discount_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
