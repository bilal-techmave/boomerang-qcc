<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\MainCompany;
use App\Policies\MainCompany as PoliciesMainCompany;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        MainCompany::class => PoliciesMainCompany::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
