<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        //

        //se agrega 7 dias para vencer el token
        Passport::tokensExpireIn(now()->addDays(7));

        Passport::tokensCan([
            '1' => 'Add/Edit/Show/Update/Delete tw_corporativos , Add/Edit/Show/Update/Delete tw_empresas_corporativos, Add/Edit/Show/Update/Delete tw_usuarios',
            '2' => 'Add/Edit/Show/Update/Delete tw_contratos_corporativos , Add/Edit/Show/Update/Delete tw_contactos_corporativos, Add/Edit/Show/Update/Delete tw_usuarios',
            '3' => 'Add/Edit/Show/Update/Delete tw_documentos , Add/Edit/Show/Update/Delete tw_documentos_corporativos, Add/Edit/Show/Update/Delete tw_usuarios',
        ]);


    }
}
