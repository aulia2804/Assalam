<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->increments('id_detail_penjualan');
            $table->integer('id_penjualan')->unsigned();
            $table->integer('id_barang')->unsigned();
            $table->integer('jumlah_barang');
            $table->integer('total_harga');
            $table->timestamps();

            $table->foreign('id_penjualan')->references('id_penjualan')->on('transaksi_penjualan');
            $table->foreign('id_barang')->references('id_barang')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_penjualan');
    }
}
