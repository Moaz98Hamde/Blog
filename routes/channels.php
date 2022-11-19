<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('new-post-channel', function ($user) {
    return true;
});

Broadcast::channel('new-comment-channel.{id}', function ($user, $userId) {
    return $user->id == $userId;
});

Broadcast::channel('online-users-channel', function ($user) {
    return ['id' => $user->id, 'name' => $user->name];
});
