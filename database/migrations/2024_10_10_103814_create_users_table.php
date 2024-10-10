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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // İstifadəçi adı
            $table->string('email')->unique(); // E-poçt, unikal olmalıdır
            $table->string('password'); // Parol
            $table->timestamps(); // Yarandığı və güncəlləndiyi tarixlər
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // İstifadəçi cədvəlini sil
    }
};
