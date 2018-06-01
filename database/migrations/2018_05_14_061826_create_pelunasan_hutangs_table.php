<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelunasanHutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelunasan_hutang', function (Blueprint $table) {
            $table->increments('id_pelunasan_hutang');
            $table->integer('id_pembelian')->unsigned();
            $table->date('tanggal_pelunasan_hutang');
            $table->integer('bayar_hutang');
            $table->string('status',15);
            $table->enum('status_hutang',['Publish','Draft'])->default('Publish');
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
        Schema::dropIfExists('pelunasan_hutang');
    }
}
