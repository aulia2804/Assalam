<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DepemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_pembelian')->insert([
            'id_pembelian' => '1',
            'id_barang' => '1',
            'jumlah_barang' => '1',
            'total_harga' => '50000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('detail_pembelian')->insert([
            'id_pembelian' => '2',
            'id_barang' => '2',
            'jumlah_barang' => '100',
            'total_harga' => '500000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
