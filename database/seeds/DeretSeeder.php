<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DeretSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_retur_pembelian')->insert([
            'id_retur_pembelian' => '1',
            'id_barang' => '2',
            'jumlah_barang' => '2',
            'total_harga' => '20000',
            'deskripsi_retur' => 'peralon pecah',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
