<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
Broadcast::routes();
Broadcast::channel('notifcation', function () {
    return true;
});

Broadcast::channel('admin.notification',  function (User $user) {
    return $user->hasRole("admins");
});
