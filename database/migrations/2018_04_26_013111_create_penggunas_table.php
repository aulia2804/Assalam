<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenggunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->increments('id_pengguna');
            $table->string('nama_pengguna',100);
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan']);
            $table->bigInteger('kontak_pengguna');
            $table->string('alamat_pengguna',200);
            $table->string('username',50)->unique();
            $table->string('password');
            $table->enum('rule',['Admin','Pemilik']);
            $table->enum('status',['Active','Non Active'])->default('Non Active');
            $table->enum('status_pengguna',['Publish','Draft'])->default('Publish');
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
        Schema::dropIfExists('pengguna');
    }
}
