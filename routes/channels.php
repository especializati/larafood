<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('order-created.{tenantId}', function ($user, $tenantId) {
    return $user->tenant_id == $tenantId;
});
