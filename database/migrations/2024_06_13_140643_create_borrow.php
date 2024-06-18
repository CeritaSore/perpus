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
        Schema::create('borrow', function (Blueprint $table) {
            $table->bigIncrements('idpeminjaman');
            $table->unsignedBigInteger('buku_id');
            $table->date('tanggal_Peminjaman');
            $table->integer('lama_peminjaman');
            $table->enum('status', ['tertunda', 'disetujui', 'dikembalikan'])->default('tertunda')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->timestamps();
            $table->foreign('buku_id')->references('idbuku')->on('buku')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow');
    }
};
