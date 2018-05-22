<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert([
            'id_pemasok' => '1',
            'id_satuan' => '5',
            'nama_barang' => 'Semen',
            'harga_jual' => '50000',
            'harga_beli' => '45000',
            'stok' => '5',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('barang')->insert([
            'id_pemasok' => '2',
            'id_satuan' => '1',
            'nama_barang' => 'Peralon',
            'harga_jual' => '10000',
            'harga_beli' => '5000',
            'stok' => '100',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
