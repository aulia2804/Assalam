<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('retur_pembelian')->insert([
            'id_pembelian' => '2',
            'tanggal_retur' => Carbon::create('2018', '05', '11'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
