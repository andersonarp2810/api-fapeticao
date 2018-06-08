<?php

use Illuminate\Database\Seeder;
use App\Administrador;
use App\Aluno;
use App\Documento;
use App\Estado;
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

        Estado::create([
            "nome" => "Petição iniciada.",
            "descricao" => "O professor autoriza a abertura da pasta para dar início a elaboração da petição."
        ]);
        Estado::create([
            "nome" => "Em elaboração.",
            "descricao" => "Após a aprovação da abertura de pasta da petição, os alunos devem escrevê-la conforme o modelo indicado pelo orientador."
        ]);
        Estado::create([
            "nome" => "Enviado para revisão.",
            "descricao" => "Ao realizar a elaboração da petição, os alunos enviam para o professor orientador revisar."
        ]);
        Estado::create([
            "nome" => "Em revisão pelo orientador.",
            "descricao" => "O orientador revisa a petição dos alunos, acrescentando comentários sobre possíveis erros no texto ou nos documentos anexados."
        ]);
        Estado::create([
            "nome" => "Devolvido para correção.",
            "descricao" => "Foram encontrados erros na petição pelo orientador, que após adicionar comentários sobre o que deve ser corrigido, devolve para reelaboração."
        ]);
        Estado::create([
            "nome" => "Em revisão pelo defensor.",
            "descricao" => "O defensor revisa a petição, acrescentando comentários sobre possíveis erros no texto ou nos documentos anexados."
        ]);
        Estado::create([
            "nome" => "Pronto para envio.",
            "descricao" => "Petição aprovada pelo defensor e pronta para o envio para o PJE."
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
