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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Məhsulun unikal identifikatoru
            $table->string('name'); // Məhsulun adı
            $table->decimal('price', 10, 2); // Məhsulun qiyməti (10 tam, 2 onluq)
            $table->integer('stock')->default(0); // Stok miqdarı, default 0
            $table->timestamps(); // Yarandığı və güncəlləndiyi tarixlər
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products'); // Məhsul cədvəlini sil
    }
};
