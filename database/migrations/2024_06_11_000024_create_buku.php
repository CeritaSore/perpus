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
        Schema::create('buku', function (Blueprint $table) {
            $table->bigIncrements('idbuku');
            $table->string('judul_buku');
            $table->unsignedBigInteger('pengarang_id');
            $table->unsignedBigInteger('penerbit_id');
            $table->unsignedBigInteger('kategori_id');
            $table->string('tahun_terbit');
            $table->enum('status', ['tersedia', 'sedang dipinjam'])->default('tersedia')->nullable();
            $table->string('deskripsi', 255)->nullable();
            $table->string('foto', 255)->nullable();
            $table->enum('status_buku', ['tersedia', 'sedang dipinjam'])->default('tersedia');
            $table->timestamps();

            // Relasi
            $table->foreign('pengarang_id')->references('idpengarang')->on('pengarangs')->onDelete('cascade');
            $table->foreign('penerbit_id')->references('idpenerbit')->on('penerbit')->onDelete('cascade');
            $table->foreign('kategori_id')->references('idkategori')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
