<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HutangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelunasan_hutang')->insert([
            'id_pembelian' => '1',
            'tanggal_pelunasan_hutang' => Carbon::create('2018', '05', '13'),
            'bayar_hutang' => '35000',
            'sisa_hutang' => '15000',
            'status' => 'belum lunas',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('pelunasan_hutang')->insert([
            'id_pembelian' => '2',
            'tanggal_pelunasan_hutang' => Carbon::create('2018', '05', '13'),
            'bayar_hutang' => '350000',
            'sisa_hutang' => '150000',
            'status' => 'belum lunas',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
