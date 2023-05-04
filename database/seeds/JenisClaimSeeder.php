<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisClaimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_claims')->insert([
            'name' => 'Child Treatment'
        ]);

        DB::table('jenis_claims')->insert([
            'name' => 'Marriage'
        ]);

        DB::table('jenis_claims')->insert([
            'name' => 'Education'
        ]);
    }
}
