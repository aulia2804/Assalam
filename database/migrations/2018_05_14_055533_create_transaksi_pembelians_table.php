<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pembelian', function (Blueprint $table) {
            $table->increments('id_pembelian');
            $table->integer('id_pengguna')->unsigned();
            $table->date('tanggal_pembelian');
            $table->enum('cara_pembelian',['Tunai','Kredit']);
            $table->date('tanggal_jatuh_tempo');
            $table->integer('total_bayar');
            $table->integer('uang_muka');
            $table->timestamps();

            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_pembelian');
    }
}
