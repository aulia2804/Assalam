<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pembelian', function (Blueprint $table) {
            $table->increments('id_detail_pembelian');
            $table->integer('id_pembelian')->unsigned();
            $table->integer('id_barang')->unsigned();
            $table->integer('jumlah_barang');
            $table->integer('total_harga');
            $table->timestamps();

            $table->foreign('id_pembelian')->references('id_pembelian')->on('transaksi_pembelian');
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
        Schema::dropIfExists('detail_pembelian');
    }
}
