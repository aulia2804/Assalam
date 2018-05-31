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
            $table->float('jumlah_barang',8,2);
            $table->integer('total_harga');
            $table->enum('status_depen',['Publish','Draft'])->default('Publish');
            $table->timestamps();

            $table->foreign('id_penjualan')->references('id_penjualan')->on('transaksi_penjualan')->onDelete('cascade');
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onDelete('cascade');
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
