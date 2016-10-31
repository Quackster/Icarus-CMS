<?php

class SiteDao {
	
	public static function loadStdClass($query)
	{		
		$array = array();
		foreach($query as $a) {
			$obj = new StdClass();
			foreach($a as $key => $val) {
				$obj->$key = $val;
			}
			$array[] = $obj;
		}
		return $array;
	}
	
}