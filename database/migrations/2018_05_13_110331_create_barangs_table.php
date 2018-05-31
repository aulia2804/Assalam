<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->integer('id_satuan')->unsigned();
            $table->integer('id_pemasok')->unsigned();
            $table->string('nama_barang',100);
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->float('stok',8,2);
            $table->enum('status_barang',['Publish','Draft'])->default('Publish');
            $table->timestamps();

            $table->foreign('id_satuan')->references('id_satuan')->on('satuan')->onDelete('cascade');
            $table->foreign('id_pemasok')->references('id_pemasok')->on('pemasok')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
