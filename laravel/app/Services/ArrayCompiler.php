<?php

namespace App\Services;

class ArrayCompiler
{

	/*
		
	*/
	public function doArrayCar($array) {
		$html12 = '';
		foreach ($array as $key => $element) {
				$html12 = $html12.'<div class="car-simple-block-2-index"><a href="/car/'.$element->id.'/'.$element->title.'" class="a-car-block2-index"><div class="jsc"><img class="img-car-simple-block-2-index" src="/images/mbw.jpg"></div><div class="jsc marginfor"><div class="car-simple-block-2-index-content"><div class="car-content-title car-car-info"><span class="span-pointer">'.$element->year.' '.$element->title.'</span></div><div class="car-content-info car-car-info"><span class="span-pointer">'.$element->most_info.'</span></div><div class="car-content-place"><span class="span-pointer">'.$element->place.'</span></div></div></div></a></div>';
		}

		return $html12;
	}

	public function doArrayNewCar($array) {
		$html = '';
		
		foreach ($array as $key => $element) {
				 $html = $html.'<div class="car-new-left"><a href="/car/'.$element->id.'/'.$element->title.'" class="a-car-block2-index"><div class="images-car-new"><img class="car-new-left-img-first" src="/images/mbw.jpg"><div class="car-new-left-img-other"> <img class="car-new-left-img-other-img" src="/images/mbw.jpg"><br><img class="car-new-left-img-other-img" src="/images/mbw.jpg"></div></div><div class="car-content-title car-car-info"><span class="span-pointer">'.$element->year.' '.$element->title.'</span></div><div class="car-content-info car-car-info"><span class="span-pointer">'.$element->most_info.'</span></div><div class="car-content-place"><span class="span-pointer">'.$element->place.'</span></div></a></div>';
		}

		return $html;
	}
}