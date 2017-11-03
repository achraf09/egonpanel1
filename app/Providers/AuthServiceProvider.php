<?php

namespace App\Providers;

use App\Role;
use App\User;
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();


        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Groups
        Gate::define('group_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('group_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('group_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('group_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('group_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: User actions
        Gate::define('user_action_access', function ($user) {
            return in_array($user->role_id, [2, 1]);
        });
        Gate::define('user_action_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });
        // Auth gates for: Contracts
        Gate::define('contract_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('contract_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('contract_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('contract_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('contract_delete', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        //Auth gates for:  betriebspartners
        Gate::define('betriebspartner_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('betriebspartner_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('betriebspartner_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('betriebspartner_show', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        //Auth gates for:  (Suppliers) Versorger
        Gate::define('supplier_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('supplier_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('supplier_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('supplier_edit', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('supplier_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });

        //Auth gates for:  Produkte der Versorger
        Gate::define('produkte_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('produkte_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('produkte_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('produkte_show', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });


    }
}
