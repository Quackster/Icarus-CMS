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

class NewsDao {
	public static function get($id) {
		$article = R::load('site_articles', $id);
		return $article;
	}

	public static function getLatest() {
		$article = R::getAll('SELECT * FROM `site_articles` ORDER by `id` DESC LIMIT 3', array());
		
		$array = array();
		foreach($article as $a) {
			$obj = new StdClass();
			foreach($a as $key => $val) {
				$obj->$key = $val;
			}
			$array[] = $obj;
		}
		return $array;
	}

	public static function getLatestOne() {
		$article = R::getAll('SELECT * FROM `site_articles` ORDER by `id` DESC LIMIT 1', array());

		foreach($article as $a) {
			$obj = new StdClass();
			foreach($a as $key => $val) {
				$obj->$key = $val;
			}
			return $obj;
		}
	}

	public static function getTop($amount) {
		$article = R::getAll('SELECT * FROM `site_articles` ORDER by `id` DESC LIMIT ' . $amount, array($amount));
		
		$array = array();
		foreach($article as $a) {
			$obj = new StdClass();
			foreach($a as $key => $val) {
				$obj->$key = $val;
			}
			$array[] = $obj;
		}
		return $array;
	}

	public static function exists($key, $value) {
		$count  = count(R::getAll("SELECT id FROM `site_articles` WHERE `" . $key . "` = :value", array(":value" => $value)));

		if($count != 1) {
			return false;
		}

		return true;
	}
}