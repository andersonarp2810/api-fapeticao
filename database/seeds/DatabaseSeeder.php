<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Professor;
use App\Roteiro;
use App\Administrador;
use App\ParteAtendida;
use App\Semestre;
use App\TipoDocumento;
use App\Documento;
use App\TipoPeticao;
use App\Peticao;

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

        factory(Professor::class, 30)->create();
        factory(Roteiro::class, 10)->create();
        factory(Administrador::class, 5)->create();
        factory(ParteAtendida::class, 5)->create();
        factory(Semestre::class, 5)->create();
        factory(TipoDocumento::class, 5)->create();
        //factory(Documento::class, 5)->create();
        //factory(TipoPeticao::class, 5)->create();
        //factory(Peticao::class, 5)->create();
    }
}
