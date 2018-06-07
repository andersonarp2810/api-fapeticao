<?php

use Illuminate\Database\Seeder;
use App\Administrador;
use App\Aluno;
use App\Documento;
use App\ParteAtendida;
use App\Peticao;
use App\Professor;
use App\Roteiro;
use App\Semestre;
use App\TipoDocumento;
use App\TipoPeticao;
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

        factory(Professor::class, 1)->create();
        factory(Roteiro::class, 30)->create();
        factory(Administrador::class, 1)->create();
        factory(ParteAtendida::class, 20)->create();
        factory(Semestre::class, 5)->create();
        factory(TipoDocumento::class, 5)->create();
        factory(Aluno::class, 3)->create();
        //factory(Documento::class, 5)->create();
        //factory(TipoPeticao::class, 5)->create();
        //factory(Peticao::class, 5)->create();
    }
}
