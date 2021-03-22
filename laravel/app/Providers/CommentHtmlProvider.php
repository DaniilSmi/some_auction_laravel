<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CommentHtmlProvider extends ServiceProvider
{
	public function register() {
		$this->app->bind('commentHtml', 'App\Services\CommentHtmlService');
	}
}