<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            "email" => "pro@fes.sor",
            "password" => bcrypt('123456'),
            "tipo" => 1
        ]);
        User::create([
            "email" => "alu@no.com",
            "password" => bcrypt('123456'),
            "tipo" => 2
        ]);
        User::create([
            "email" => "ad@min.com",
            "password" => bcrypt('123456'),
            "tipo" => 3
        ]);
        User::create([
            "email" => "def@en.sor",
            "password" => bcrypt('123456'),
            "tipo" => 4
        ]);
        
    }
}
