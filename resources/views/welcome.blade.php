<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>API Fapetição</title>
    </head>
    <body>

        <p style="white-space: pre; font-family: 'Courier New', Courier, monospace; font-size: 14">
+-----------+----------------------------------+-------------------------+------------------------------------------------------+
| Method    | URI                              | Name                    | Action                                               |
+-----------+----------------------------------+-------------------------+------------------------------------------------------+
| GET|HEAD  | /                                | home                    | Closure                                              |
| GET|HEAD  | administradors                   | administradors.index    | App\Http\Controllers\AdministradorController@index   |
| POST      | administradors                   | administradors.store    | App\Http\Controllers\AdministradorController@store   |
| DELETE    | administradors/{administrador}   | administradors.destroy  | App\Http\Controllers\AdministradorController@destroy |
| PUT|PATCH | administradors/{administrador}   | administradors.update   | App\Http\Controllers\AdministradorController@update  |
| GET|HEAD  | administradors/{administrador}   | administradors.show     | App\Http\Controllers\AdministradorController@show    |
| POST      | alunos                           | alunos.store            | App\Http\Controllers\AlunoController@store           |
| GET|HEAD  | alunos                           | alunos.index            | App\Http\Controllers\AlunoController@index           |
| DELETE    | alunos/{aluno}                   | alunos.destroy          | App\Http\Controllers\AlunoController@destroy         |
| GET|HEAD  | alunos/{aluno}                   | alunos.show             | App\Http\Controllers\AlunoController@show            |
| PUT|PATCH | alunos/{aluno}                   | alunos.update           | App\Http\Controllers\AlunoController@update          |
| POST      | comentarios                      | comentarios.store       | App\Http\Controllers\ComentarioController@store      |
| GET|HEAD  | comentarios                      | comentarios.index       | App\Http\Controllers\ComentarioController@index      |
| GET|HEAD  | comentarios/{comentario}         | comentarios.show        | App\Http\Controllers\ComentarioController@show       |
| DELETE    | comentarios/{comentario}         | comentarios.destroy     | App\Http\Controllers\ComentarioController@destroy    |
| PUT|PATCH | comentarios/{comentario}         | comentarios.update      | App\Http\Controllers\ComentarioController@update     |
| POST      | defensors                        | defensors.store         | App\Http\Controllers\DefensorController@store        |
| GET|HEAD  | defensors                        | defensors.index         | App\Http\Controllers\DefensorController@index        |
| DELETE    | defensors/{defensor}             | defensors.destroy       | App\Http\Controllers\DefensorController@destroy      |
| GET|HEAD  | defensors/{defensor}             | defensors.show          | App\Http\Controllers\DefensorController@show         |
| PUT|PATCH | defensors/{defensor}             | defensors.update        | App\Http\Controllers\DefensorController@update       |
| GET|HEAD  | documentos                       | documentos.index        | App\Http\Controllers\DocumentoController@index       |
| POST      | documentos                       | documentos.store        | App\Http\Controllers\DocumentoController@store       |
| DELETE    | documentos/{documento}           | documentos.destroy      | App\Http\Controllers\DocumentoController@destroy     |
| GET|HEAD  | documentos/{documento}           | documentos.show         | App\Http\Controllers\DocumentoController@show        |
| PUT|PATCH | documentos/{documento}           | documentos.update       | App\Http\Controllers\DocumentoController@update      |
| POST      | emails                           | emails.store            | App\Http\Controllers\EmailController@store           |
| GET|HEAD  | emails                           | emails.index            | App\Http\Controllers\EmailController@index           |
| GET|HEAD  | emails/{email}                   | emails.show             | App\Http\Controllers\EmailController@show            |
| DELETE    | emails/{email}                   | emails.destroy          | App\Http\Controllers\EmailController@destroy         |
| PUT|PATCH | emails/{email}                   | emails.update           | App\Http\Controllers\EmailController@update          |
| POST      | enderecos                        | enderecos.store         | App\Http\Controllers\EnderecoController@store        |
| GET|HEAD  | enderecos                        | enderecos.index         | App\Http\Controllers\EnderecoController@index        |
| GET|HEAD  | enderecos/{endereco}             | enderecos.show          | App\Http\Controllers\EnderecoController@show         |
| PUT|PATCH | enderecos/{endereco}             | enderecos.update        | App\Http\Controllers\EnderecoController@update       |
| DELETE    | enderecos/{endereco}             | enderecos.destroy       | App\Http\Controllers\EnderecoController@destroy      |
| GET|HEAD  | estados                          | estados.index           | App\Http\Controllers\EstadoController@index          |
| POST      | estados                          | estados.store           | App\Http\Controllers\EstadoController@store          |
| GET|HEAD  | estados/{estado}                 | estados.show            | App\Http\Controllers\EstadoController@show           |
| DELETE    | estados/{estado}                 | estados.destroy         | App\Http\Controllers\EstadoController@destroy        |
| PUT|PATCH | estados/{estado}                 | estados.update          | App\Http\Controllers\EstadoController@update         |
| POST      | login                            |                         | App\Http\Controllers\AuthController@login            |
| POST      | logout                           |                         | App\Http\Controllers\AuthController@logout           |
| POST      | me                               |                         | App\Http\Controllers\AuthController@me               |
| POST      | operacaos                        | operacaos.store         | App\Http\Controllers\OperacaoController@store        |
| GET|HEAD  | operacaos                        | operacaos.index         | App\Http\Controllers\OperacaoController@index        |
| GET|HEAD  | operacaos/{operacao}             | operacaos.show          | App\Http\Controllers\OperacaoController@show         |
| DELETE    | operacaos/{operacao}             | operacaos.destroy       | App\Http\Controllers\OperacaoController@destroy      |
| PUT|PATCH | operacaos/{operacao}             | operacaos.update        | App\Http\Controllers\OperacaoController@update       |
| POST      | parte_atendidas                  | parte_atendidas.store   | App\Http\Controllers\ParteAtendidaController@store   |
| GET|HEAD  | parte_atendidas                  | parte_atendidas.index   | App\Http\Controllers\ParteAtendidaController@index   |
| DELETE    | parte_atendidas/{parte_atendida} | parte_atendidas.destroy | App\Http\Controllers\ParteAtendidaController@destroy |
| GET|HEAD  | parte_atendidas/{parte_atendida} | parte_atendidas.show    | App\Http\Controllers\ParteAtendidaController@show    |
| PUT|PATCH | parte_atendidas/{parte_atendida} | parte_atendidas.update  | App\Http\Controllers\ParteAtendidaController@update  |
| POST      | pastas                           | pastas.store            | App\Http\Controllers\PastaController@store           |
| GET|HEAD  | pastas                           | pastas.index            | App\Http\Controllers\PastaController@index           |
| GET|HEAD  | pastas/{pasta}                   | pastas.show             | App\Http\Controllers\PastaController@show            |
| PUT|PATCH | pastas/{pasta}                   | pastas.update           | App\Http\Controllers\PastaController@update          |
| DELETE    | pastas/{pasta}                   | pastas.destroy          | App\Http\Controllers\PastaController@destroy         |
| POST      | professors                       | professors.store        | App\Http\Controllers\ProfessorController@store       |
| GET|HEAD  | professors                       | professors.index        | App\Http\Controllers\ProfessorController@index       |
| PUT|PATCH | professors/{professor}           | professors.update       | App\Http\Controllers\ProfessorController@update      |
| DELETE    | professors/{professor}           | professors.destroy      | App\Http\Controllers\ProfessorController@destroy     |
| GET|HEAD  | professors/{professor}           | professors.show         | App\Http\Controllers\ProfessorController@show        |
| POST      | refresh                          |                         | App\Http\Controllers\AuthController@refresh          |
| POST      | roteiros                         | roteiros.store          | App\Http\Controllers\RoteiroController@store         |
| GET|HEAD  | roteiros                         | roteiros.index          | App\Http\Controllers\RoteiroController@index         |
| PUT|PATCH | roteiros/{roteiro}               | roteiros.update         | App\Http\Controllers\RoteiroController@update        |
| GET|HEAD  | roteiros/{roteiro}               | roteiros.show           | App\Http\Controllers\RoteiroController@show          |
| DELETE    | roteiros/{roteiro}               | roteiros.destroy        | App\Http\Controllers\RoteiroController@destroy       |
| GET|HEAD  | semestres                        | semestres.index         | App\Http\Controllers\SemestreController@index        |
| POST      | semestres                        | semestres.store         | App\Http\Controllers\SemestreController@store        |
| GET|HEAD  | semestres/{semestre}             | semestres.show          | App\Http\Controllers\SemestreController@show         |
| PUT|PATCH | semestres/{semestre}             | semestres.update        | App\Http\Controllers\SemestreController@update       |
| DELETE    | semestres/{semestre}             | semestres.destroy       | App\Http\Controllers\SemestreController@destroy      |
| GET|HEAD  | telefones                        | telefones.index         | App\Http\Controllers\TelefoneController@index        |
| POST      | telefones                        | telefones.store         | App\Http\Controllers\TelefoneController@store        |
| GET|HEAD  | telefones/{telefone}             | telefones.show          | App\Http\Controllers\TelefoneController@show         |
| PUT|PATCH | telefones/{telefone}             | telefones.update        | App\Http\Controllers\TelefoneController@update       |
| DELETE    | telefones/{telefone}             | telefones.destroy       | App\Http\Controllers\TelefoneController@destroy      |
| POST      | tipo_documentos                  | tipo_documentos.store   | App\Http\Controllers\TipoDocumentoController@store   |
| GET|HEAD  | tipo_documentos                  | tipo_documentos.index   | App\Http\Controllers\TipoDocumentoController@index   |
| DELETE    | tipo_documentos/{tipo_documento} | tipo_documentos.destroy | App\Http\Controllers\TipoDocumentoController@destroy |
| PUT|PATCH | tipo_documentos/{tipo_documento} | tipo_documentos.update  | App\Http\Controllers\TipoDocumentoController@update  |
| GET|HEAD  | tipo_documentos/{tipo_documento} | tipo_documentos.show    | App\Http\Controllers\TipoDocumentoController@show    |
| GET|HEAD  | tipo_operacaos                   | tipo_operacaos.index    | App\Http\Controllers\TipoOperacaoController@index    |
| POST      | tipo_operacaos                   | tipo_operacaos.store    | App\Http\Controllers\TipoOperacaoController@store    |
| PUT|PATCH | tipo_operacaos/{tipo_operacao}   | tipo_operacaos.update   | App\Http\Controllers\TipoOperacaoController@update   |
| DELETE    | tipo_operacaos/{tipo_operacao}   | tipo_operacaos.destroy  | App\Http\Controllers\TipoOperacaoController@destroy  |
| GET|HEAD  | tipo_operacaos/{tipo_operacao}   | tipo_operacaos.show     | App\Http\Controllers\TipoOperacaoController@show     |
| GET|HEAD  | user                             |                         | Closure                                              |
| POST      | users                            | users.store             | App\Http\Controllers\UserController@store            |
| GET|HEAD  | users                            | users.index             | App\Http\Controllers\UserController@index            |
| DELETE    | users/{user}                     | users.destroy           | App\Http\Controllers\UserController@destroy          |
| PUT|PATCH | users/{user}                     | users.update            | App\Http\Controllers\UserController@update           |
| GET|HEAD  | users/{user}                     | users.show              | App\Http\Controllers\UserController@show             |
+-----------+----------------------------------+-------------------------+------------------------------------------------------+
        </p>

    </body>
</html>