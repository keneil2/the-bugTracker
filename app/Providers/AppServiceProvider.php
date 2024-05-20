<?php

namespace App\Providers;
use App\Models\bug;
use App\Policies\BugPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
        Gate::policy(bug::class, BugPolicy::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define("isAdmin" , function(User $user){

          return ($user->role->name === "admins");     

        });

        Gate::define("isAssigned",function(User $user){
            return $user->role->name==="developer" || $user->role->name==="tester";
        });

       
        
        
    }
}
