<?php

namespace App\Providers;

use App\Product;
use App\Services\PermissionGateAndPolicyAccess;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Define permission
        $getAndPolicy = new PermissionGateAndPolicyAccess();
        $getAndPolicy->setGateAndPolicyAccess();

        Gate::define('menu-list', function ($user) {
            return $user->checkPermissionAcces(config('permissions.access.list-menu'));
        });

        Gate::define('product-edit', function ($user, $id) {
            $product = Product::find($id);
            if( $user->checkPermissionAcces(config('permissions.access.product-edit')) && $user>id === $product->user_id){
                return true;
            }
            return false;
        });

        Gate::define('product-list', function ($user) {
            return $user->checkPermissionAcces(config('permissions.access.list-product'));
        });
    }

}
