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
            "pessoa_id" => 1,
            "pessoa_type" => "professor"
        ]);
        User::create([
            "email" => "alu@no.com",
            "password" => bcrypt('123456'),
            "pessoa_id" => 1,
            "pessoa_type" => "aluno"
        ]);
        User::create([
            "email" => "ad@min.com",
            "password" => bcrypt('123456'),
            "pessoa_id" => 1,
            "pessoa_type" => "administrador"
        ]);
        User::create([
            "email" => "def@en.sor",
            "password" => bcrypt('123456'),
            "pessoa_id" => 1,
            "pessoa_type" => "defensor"
        ]);

        factory(App\Professor::class, 30)->create();
        factory(App\Roteiro::class, 10)->create();
        
    }
}
