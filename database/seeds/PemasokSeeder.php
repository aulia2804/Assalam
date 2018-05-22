<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class PemasokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pemasok')->insert([
            'nama_pemasok' => 'Semen Gresik',
            'kontak_pemasok' => '081222132452',
            'alamat_pemasok' => 'Malang, Jawa Timur',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('pemasok')->insert([
            'nama_pemasok' => 'Propan',
            'kontak_pemasok' => '081222132452',
            'alamat_pemasok' => 'Malang, Jawa Timur',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
