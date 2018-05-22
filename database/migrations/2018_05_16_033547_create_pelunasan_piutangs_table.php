<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelunasanPiutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelunasan_piutang', function (Blueprint $table) {
            $table->increments('id_pelunasan_piutang');
            $table->integer('id_penjualan')->unsigned();
            $table->date('tanggal_pelunasan_piutang');
            $table->integer('bayar_piutang');
            $table->integer('sisa_piutang');
            $table->string('status',15);
            $table->timestamps();

            $table->foreign('id_penjualan')->references('id_penjualan')->on('transaksi_penjualan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelunasan_piutang');
    }
}
