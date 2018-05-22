<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailReturPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_retur_pembelian', function (Blueprint $table) {
            $table->increments('id_detail_retur');
            $table->integer('id_retur_pembelian')->unsigned();
            $table->integer('id_barang')->unsigned();
            $table->integer('jumlah_barang');
            $table->integer('total_harga');
            $table->string('deskripsi_retur',200);
            $table->timestamps();

            $table->foreign('id_retur_pembelian')->references('id_retur_pembelian')->on('retur_pembelian');
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
        Schema::dropIfExists('detail_retur_pembelian');
    }
}
