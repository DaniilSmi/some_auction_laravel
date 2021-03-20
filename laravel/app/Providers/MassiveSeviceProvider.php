<?php
namespace App\Providers;
 
use 
use Illuminate\Support\ServiceProvider;
 
class RiakServiceProvider extends ServiceProvider
{
    /**
     * Register arrays to the container
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Connection::class, function ($app) {
            return new Connection(config('riak'));
        });
    }
}