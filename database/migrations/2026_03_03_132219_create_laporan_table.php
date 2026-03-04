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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('judul');
            $table->enum('kategori', ['Jalan Rusak', 'Banjir', 'Sampah', 'Lampu Mati', 'Lainnya']);
            $table->text('deskripsi');
            $table->json('foto')->nullable(); // max 3 foto
            $table->enum('status', ['Belum Dibaca', 'Dikerjakan', 'Selesai', 'Ditolak'])->default('Belum Dibaca');
            $table->text('catatan_petugas')->nullable(); // alasan ditolak dll
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
