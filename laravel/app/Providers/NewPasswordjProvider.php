<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NewPasswordjProvider extends ServiceProvider
{
	public function register() {
		$this->app->bind('NewPS', 'App\Services\NewPasswordj');
	}
}