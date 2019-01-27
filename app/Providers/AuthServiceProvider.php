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
        'App\Model'    => 'App\Policies\ModelPolicy',
        // ExpenceモデルとExpencePolicyの関連付けを行う
        'App\Expence'  => 'App\Policies\ExpencePolicy',
        'App\Category' => 'App\Policies\CategoryPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
