<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ForgotPasswordProvider extends ServiceProvider
{
	public function register() {
		$this->app->bind('forgotPassword', 'App\Services\ForgotPassword');
	}
}