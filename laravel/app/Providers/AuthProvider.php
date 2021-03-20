<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AuthProvider extends ServiceProvider
{
	public function register() {
		$this->app->bind('AuthU', 'App\Services\Login');
		$this->app->bind('AuthUR', 'App\Services\Register');
	}
}