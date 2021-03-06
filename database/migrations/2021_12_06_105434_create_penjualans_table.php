<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id('id_penjualan');
            $table->foreignId('id_barang')->constrained('barangs', 'id_barang');
            $table->foreignId('id_transaksi')->nullable()->constrained('detail_penjualans', 'id_detail_penjualan');
            $table->integer('harga');
            $table->integer('qty');
            $table->integer('subtotal');
            $table->integer('laba');
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
        Schema::dropIfExists('penjualans');
    }
}
