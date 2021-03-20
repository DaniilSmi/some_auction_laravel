<?php

namespace App\Services;

class SearchLevinstain 
{

	private $templateSql;
	// construct sql query for do something
	private function doSql($words) {
		$templateSql = "SELECT `title` FROM ( SELECT `title`, MAX(`upload_time`) AS `upload_time` FROM `car-imp` WHERE";

		foreach ($words as $key => $value) {
			$templateSql = $templateSql." `title` LIKE '%".$words[$key]."%' OR `make` LIKE '%".$words[$key]."%'";
			if ($key != count($words) - 1) {
				$templateSql = $templateSql." OR";
			}
		}

		$templateSql = $templateSql.' GROUP BY `title` ) t ORDER BY `upload_time` DESC LIMIT 7';

		return $templateSql;
	}
	private function getLevenshtein1($word) {
	    $words = array();
	    for ($i = 0; $i < strlen($word); $i++) {
	        // insertions
	        $words[] = substr($word, 0, $i) . '_' . substr($word, $i);
	        // deletions
	        $words[] = substr($word, 0, $i) . substr($word, $i + 1);
	        // substitutions
	        $words[] = substr($word, 0, $i) . '_' . substr($word, $i + 1);
	    }
	    // last insertion
	    $words[] = $word . '_';
	    return $this->doSql($words);
	}

	public function getResultSql($word) {
		return $this->getLevenshtein1($word);
	}
}