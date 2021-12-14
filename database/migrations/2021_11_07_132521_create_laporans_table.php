<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang')->constrained('barangs', 'id_barang');
            $table->integer('total_penjualan')->nullable();
            $table->integer('banyak_penjualan')->nullable();
            $table->integer('total_pembelian')->nullable();
            $table->integer('banyak_pembelian')->nullable();
            $table->integer('pendapatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}
