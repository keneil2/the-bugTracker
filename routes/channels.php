<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
Broadcast::routes();
// Broadcast::channel('notifcation', function (User $user) {
//     return $user->hasRole(("admin"));
// });

// Broadcast::channel('admin.notification',  function (User $user) {
//     return $user->hasRole("admins");
// });
Broadcast::channel('newbugtotest',  function (User $user) {
    return true;
});

