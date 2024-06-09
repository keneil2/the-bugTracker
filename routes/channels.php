<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
Broadcast::routes();
Broadcast::channel('notifcation', function () {
    return true;
});

Broadcast::channel('private-admin.notification.{id}',  function (User $user, $userId) {
    return $user->id === $userId;
} );
