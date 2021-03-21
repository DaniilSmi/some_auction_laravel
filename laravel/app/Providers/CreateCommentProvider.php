<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CreateCommentProvider extends ServiceProvider
{
	public function register() {
		$this->app->bind('newComment', 'App\Services\CreateCommentService');
	}
}