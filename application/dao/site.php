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
	
	public static function getValue($key) {
		$site = R::getAll('SELECT * FROM `site_config` WHERE `key` = ?', array($key));
		return $site[0]['value'];
	}
}