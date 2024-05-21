<?php

namespace App\Providers;
use App\Models\bug;
use App\Models\Project;
use App\Policies\BugPolicy;
use App\Policies\ProjectPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Project::class => ProjectPolicy::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
        Gate::policy(bug::class, BugPolicy::class);

        Gate::policy(Project::class, ProjectPolicy::class);
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
