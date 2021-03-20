<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SearchLevinstainServiceProvider extends ServiceProvider
{
	public function register() {
		$this->app->bind('SearchOperations', 'App\Services\SearchLevinstain');
	}
}