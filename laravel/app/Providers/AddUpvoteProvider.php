<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AddUpvoteProvider extends ServiceProvider
{
	public function register() {
		$this->app->bind('UpO', 'App\Services\AddUpvoteService');
	}
}