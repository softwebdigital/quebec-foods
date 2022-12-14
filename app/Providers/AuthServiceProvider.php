<?php

namespace App\Providers;

use App\Models\Investment;
use App\Models\Transaction;
use App\Policies\InvestmentPolicy;
use App\Policies\ModelPolicy;
use App\Policies\TransactionPolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         Model::class => ModelPolicy::class,
         Investment::class => InvestmentPolicy::class,
         Transaction::class => TransactionPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
