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
            $table->id();
            $table->unsignedBigInteger('id_kategori');
            $table->string('nama_produk');
            $table->string('kode_produk')->unique(5);
            $table->string('gambar');
            $table->text('deskripsi');
            $table->double('jumlah');
            $table->double('harga', 12, 2)->default(0);
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
            $table->timestamps();

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
