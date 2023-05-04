<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Wahyu Nugroho Indrawinata',
            'email' => 'korodarmo@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$MI927jLP5PzLOF.7el6.7.deKxL1gxeTiqu0HlA3/M0ahEmXBjwGW',
            'remember_token' => Str::random(10),
            'role' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'pegawai 1',
            'email' => 'pegawai1@company.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$go9NlYjyXADwU7KuUtEXfu5XnOC5QAUb/ELH3i5.XmBNWlQ0cte3a',
            'remember_token' => Str::random(10),
            'role' => 2
        ]);
    }
}
