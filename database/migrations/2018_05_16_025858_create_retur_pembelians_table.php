<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur_pembelian', function (Blueprint $table) {
            $table->increments('id_retur_pembelian');
            $table->integer('id_pembelian')->unsigned();
            $table->date('tanggal_retur');
            $table->enum('status_retur',['Publish','Draft'])->default('Publish');
            $table->timestamps();

            $table->foreign('id_pembelian')->references('id_pembelian')->on('transaksi_pembelian')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retur_pembelian');
    }
}
