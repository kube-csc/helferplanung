<?php

namespace App\Providers;

use App\Models\OperationalLocation;
use App\Models\Team;
use App\Models\timetabelHelperList;
use App\Models\User;
use App\Policies\OperationalLocationPolicy;
use App\Policies\TeamPolicy;
use App\Policies\TimetabelHelperListPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        User::class => UserPolicy::class,
        OperationalLocation::class => OperationalLocationPolicy::class,
        timetabelHelperList::class => TimetabelHelperListPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
