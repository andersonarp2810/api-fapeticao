<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\User' => 'App\Policies\UserPolicy',
        'App\TipoPeticao' => 'App\Policies\TipoPeticaoPolicy',
        'App\TipoOperacao' => 'App\Policies\TipoOperacaoPolicy',
        'App\TipoDocumento' => 'App\Policies\TipoDocumentoPolicy',
        'App\Telefone' => 'App\Policies\TelefonePolicy',
        'App\Semestre' => 'App\Policies\SemestrePolicy',
        'App\Roteiro' => 'App\Policies\RoteiroPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }
}
