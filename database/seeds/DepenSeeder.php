<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DepenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_penjualan')->insert([
            'id_penjualan' => '1',
            'id_barang' => '2',
            'jumlah_barang' => '3',
            'total_harga' => '30000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
