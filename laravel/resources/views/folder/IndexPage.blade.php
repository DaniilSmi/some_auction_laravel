@extends('base')

@section('title', 'Auction')

@section('content')
		<div class="block-index-1" style="background: url({{asset('images/ferrari.jpg') }}); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
			<div class="get-dark-block"></div>
			<div class="block-index-1-text">
				<div class="container href-container some-delete-flex">
					<div class="calculator-1"><span>Some calculator here<span></div>
					<div class="text-calculator"><p>Some text here...</p></div>
				</div>
			</div>
		</div>
		<div class="block-index-2">
			<div class="container">
				<div class="calculator-2"><span>Another calculator here.</span></div>
				<div class="slider">
						<div class="slider-titles"><a href="javascript://" class="slider-titles-hrefs">Makes</a><a href="javascript://" class="slider-titles-hrefs">Models</a><a href="javascript://" class="slider-titles-hrefs">Featured</a><a href="javascript://" class="slider-titles-hrefs">Types</a></div>
						<div class="sliderss">
							<div class="slider-content">
								<div class="slide">
									<h2>Makes</h2>
									<div class="slide-inside-content">
										<a href="#" class="slide-inside-content-hrefs">Porshce</a>
										<a href="#" class="slide-inside-content-hrefs">Porshce</a>
										<a href="#" class="slide-inside-content-hrefs">Porshce</a>
										<a href="#" class="slide-inside-content-hrefs">Porshce</a>
										<a href="#" class="slide-inside-content-hrefs">Porshce</a>
										<a href="#" class="slide-inside-content-hrefs">Porshce</a>
										<a href="#" class="slide-inside-content-hrefs">Porshce</a>
										<a href="#" class="slide-inside-content-hrefs">Porshce</a>
										<a href="#" class="slide-inside-content-hrefs">Porshce</a>
										<a href="#" class="slide-inside-content-hrefs">Porshce</a>
										<a href="#" class="slide-inside-content-hrefs">Porshce</a>
										<a href="#" class="slide-inside-content-hrefs">Porshce</a>

									</div>
								</div>
								<div class="slide">
									<h2>Models</h2>
									<div class="slide-inside-content">
										
									</div>
								</div>
								<div class="slide">
									<h2>Featured</h2>
									<div class="slide-inside-content">
										
									</div>
								</div>
								<div class="slide">
									<h2>Types</h2>
									
								
									<div class="slide-inside-content">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				<div class="block-content-index-2">
					
					<div class="block-content-index-2-left">
						<h1 class="margin-popular">Popular Vehicles Right Now</h1>
						<div class="block-content-index-2-left-content">
						</div>
						<div class="jsc"><button id="ajax-pagination-button">See more</button></div>
					</div>
					<div class="block-content-index-2-right">
						<h1>Now</h1>

						<div class="block-content-index-2-right-content">
						</div>
					</div>
				</div>
			</div>
		</div>

@stop

@section('javascript')
	<script type="text/javascript" src="{{ asset('js/indexslider.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/ajax/index-page-ajax.js') }}"></script>
@stop