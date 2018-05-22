<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('satuan')->insert([
            'nama_satuan' => 'batang',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('satuan')->insert([
            'nama_satuan' => 'buah',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('satuan')->insert([
            'nama_satuan' => 'kg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('satuan')->insert([
            'nama_satuan' => 'kubik',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('satuan')->insert([
            'nama_satuan' => 'dus',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('satuan')->insert([
            'nama_satuan' => 'sak',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
