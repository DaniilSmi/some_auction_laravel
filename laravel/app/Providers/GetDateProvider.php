<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GetDateProvider extends ServiceProvider
{
	public function register() {
		$this->app->bind('getDate', 'App\Services\GetDataService');
	}
}