<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusClaimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_claims')->insert([
            'name' => 'Pending'
        ]);

        DB::table('status_claims')->insert([
            'name' => 'Approve'
        ]);

        DB::table('status_claims')->insert([
            'name' => 'Reject'
        ]);
    }
}
