<?php
/*
	 /'\_/`\                                    
	/\      \     __      ___      __     ___   
	\ \ \__\ \  /'__`\  /' _ `\  /'_ `\  / __`\ 
	 \ \ \_/\ \/\ \L\.\_/\ \/\ \/\ \L\ \/\ \L\ \
	  \ \_\\ \_\ \__/.\_\ \_\ \_\ \____ \ \____/
	   \/_/ \/_/\/__/\/_/\/_/\/_/\/___L\ \/___/ 
	                               /\____/      
	                               \_/__/       
	@author Leon Hartley
*/

class HkDao {

    public static function article_exists($id) {
		$count  = count(R::getAll("SELECT id FROM `site_articles` WHERE `id` = :value", array(":value" => $id)));

		if($count != 1) {
			return false;
		}

		return true;
	}
    
    public static function targetedoffer_exists($id) {
		$count  = count(R::getAll("SELECT id FROM `targeted_offers` WHERE `id` = :value", array(":value" => $id)));

		if($count != 1) {
			return false;
		}

		return true;
	}
    
    public static function campaign_exists($id) {
		$count  = count(R::getAll("SELECT id FROM `site_campaigns` WHERE `id` = :value", array(":value" => $id)));

		if($count != 1) {
			return false;
		}

		return true;
	}

	public static function getNote($id) {
		$rank = R::getAll('SELECT * FROM `site_housekeeping_notes` WHERE user_id = ' . $id, array());
		
		$array = array();
		foreach($rank as $a) {
			$obj = new StdClass();
			foreach($a as $key => $val) {
				$obj->$key = $val;
			}
			$array[] = $obj;
		}
		return $array;
	}
}