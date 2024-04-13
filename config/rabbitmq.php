<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Cache\RabbitMQStore;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // $this->app->singleton('cache.store.rabbitmq', function ($app) {
        //     // Get RabbitMQ connection parameters from .env file
        //     $connection = [
        //         'host' => config('RABBITMQ_HOST'),
        //         'port' => config('RABBITMQ_PORT'),
        //         'user' => config('RABBITMQ_USER'),
        //         'password' => config('RABBITMQ_PASSWORD'),
        //     ];

        //     // Instantiate RabbitMQStore with connection parameters
        //     return new RabbitMQStore($connection);
        // });
    }
}
