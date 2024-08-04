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
        Schema::create('barang', function (Blueprint $table) {
            $table->id('nama_barang');
            $table->unsignedBigInteger('kode_barang');
            $table->integer('harga')->nullable(false);
            $table->timestamps();

            $table->foreign('kode_barang')->references('id_pembelian')->on('pembelian_barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
        Schema::dropIfExists('pembelian_barang');
    }
};
