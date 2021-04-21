<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CreateBidProvider extends ServiceProvider
{
	public function register() {
		//$this->app->bind('UpO', 'App\Services\AddUpvoteService');

		// bind two classes `bd queryes and some thing`
		$this->app->bind(
			'App\Services\AddBidDB',
			'App\Services\AddBid'
		);
	}

	public function boot() {
		
	}
}