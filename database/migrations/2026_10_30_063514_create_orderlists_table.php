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
        Schema::create('orderlists', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 15, 3);
            $table->decimal('price', 15, 3);
            $table->foreignId('id_order')->constrained()->onDelete('cascade');
            $table->foreignId('id_product')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderlists');
    }
};
