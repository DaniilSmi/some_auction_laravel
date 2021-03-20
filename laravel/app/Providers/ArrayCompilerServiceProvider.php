<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ArrayCompilerServiceProvider extends ServiceProvider
{
	public function register() {
		$this->app->bind('ArrayOperations', 'App\Services\ArrayCompiler');
	}
}