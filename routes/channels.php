<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('notifcation', function () {
    return true;
});
