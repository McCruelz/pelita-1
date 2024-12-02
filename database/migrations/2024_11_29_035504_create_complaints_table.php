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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->foreignId('id_pengguna')->constrained('users')->onDelete('cascade'); // FK to users table
            $table->string('deskripsi_laporan', 500);
            $table->timestamp('tanggal_laporan')->useCurrent();
            $table->string('bukti_laporan')->nullable(); // File path
            $table->enum('status_laporan', ['pending', 'proses', 'selesai'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
