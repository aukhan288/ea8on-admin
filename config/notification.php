<?php

return [

    /*
    |----------------------------------------------------------------------
    | Notification Channels
    |----------------------------------------------------------------------
    |
    | Here you may define the channels used for notifications. Each
    | channel corresponds to a notification service provider.
    |
    */

    'channels' => [
        'fcm' => NotificationChannels\FCM\FCMChannel::class,
    ],

];
