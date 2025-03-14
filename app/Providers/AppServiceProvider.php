<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use NotificationChannels\FCM\FCMChannel;
use Illuminate\Notifications\ChannelManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
           // Set the FCM configuration dynamically from the .env file
           $this->app['config']->set('fcm.server_key', env('FCM_SERVER_KEY'));
           $this->app['config']->set('fcm.sender_id', env('FCM_SENDER_ID'));
   
           // Bind the FCM channel to the notification manager
           $this->app[ChannelManager::class]->extend('fcm', function ($app) {
               return new FCMChannel();
           });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
