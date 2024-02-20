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
// Definisi Tabel Pembayaran
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->unsignedBigInteger('id_petugas');
            $table->char('nisn', 10); // Kolom nisn pertama
            $table->date('tgl_bayar');
            $table->string('bulan_dibayar', 8);
            $table->string('tahun_dibayar', 4);
            $table->integer('jumlah_bayar');
            $table->unsignedBigInteger('id_spp');
            $table->timestamps();

            // Tambahkan kunci asing jika diperlukan
            $table->foreign('id_petugas')->references('id_petugas')->on('petugases');
            $table->foreign('nisn')->references('nisn')->on('siswas');
            $table->foreign('id_spp')->references('id_spp')->on('spps');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};