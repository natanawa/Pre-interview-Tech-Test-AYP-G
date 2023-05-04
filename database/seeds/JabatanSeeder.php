<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatans')->insert([
            'name' => 'Head Of IT'
        ]);

        DB::table('jabatans')->insert([
            'name' => 'Head Of Finance'
        ]);

        DB::table('jabatans')->insert([
            'name' => 'Head Of Marketing'
        ]);
    }
}
