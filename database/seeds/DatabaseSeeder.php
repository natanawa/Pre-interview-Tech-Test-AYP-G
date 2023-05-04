<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(JabatanSeeder::class);
         $this->call(DepartemenSeeder::class);
         $this->call(JenisClaimSeeder::class);
         $this->call(StatusClaimSeeder::class);
    }
}
