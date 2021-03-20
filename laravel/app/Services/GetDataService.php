<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use DateTime;

// get and compile data

class GetDataService
{
	private function getDataMechanisme($id) {
		// get information from data base
		$data = DB::select('SELECT * FROM `car-imp` WHERE `id` = ? LIMIT 1', [$id]);

		// check for a data
			if (!empty($data)) {
				// set split
				$data = $data[0];
				// set data from db into DateTime class
				$date = new \DateTime($data->time_to_end);
				$currentDate = new \DateTime(date('Y-m-d h:m:s'));

				// if first date more than second date - return
				if ($date > $currentDate) {
				// calculate how long will it last
				$final = $date->diff($currentDate);
				// set array data
				$array = array('d' => $final->d, 'h' => $final->h, 'm' => $final->i, 's' => $final->s);

				// check for days
				if ($array['d'] != 0) {
					// initialize date
					if ($array['d']==1) {
						$day = ' Day';
					} else {
						$day = ' Days';
					}

					// return days
					return $array['d'].$day;
				} else {
					//return hours, minutes and seconds
					return $array['h'].':'.$array['m'].':'.$array['s'];
				}
			} else {
				return 'finaled';
			}

			}
	}

	// call private method
	public function getData($id){
		return $this->getDataMechanisme($id);
	}
}