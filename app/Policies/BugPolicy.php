<?php

namespace App\Policies;

use App\Models\User;
use App\Models\bug;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;

class BugPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole("admins") || $user->hasRole("developer") || $user->hasRole("tester");
    }

    /**
     * Determine whether the user can view the model.
     */
    public function edit(User $user, bug $bug): bool
    {
        if($user->id === $bug->user_id){
          return true;
        }
        return $user->hasRole("admins") || $user->hasRole("developer") || $user->hasRole("tester"); 
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, bug $bug): bool
    {
         return $user->hasRole("admins") || $user->hasRole("developer") || $user->hasRole("tester") || $user->id===$bug->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, bug $bug): bool
    {
        return $user->hasRole("admins") || $user->id==$bug->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, bug $bug): bool
    {
        //
    }

    /**
     * where the user can delete all the bugs
     */
    public function deleteMany(User $user, bug $bug): bool
    {
        return $user->hasRole("admins");
    }
}
