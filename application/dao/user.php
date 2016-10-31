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

class UserDao {

	public static function get() {
		$user = R::load('users', Session::getAuth()); 
		return $user;
	}

	public static function getByKey($key, $value) {
		$user = R::getAll("SELECT * FROM `users` WHERE `" . $key . "` = :value", array(":value" => $value));
		return $user;
	}

	public static function getByRank($rank) {
		$user = R::getAll("SELECT * FROM `users` WHERE `rank` = :rank", array(":rank" => $rank));

		$array = array();

		foreach($user as $a) {

			$obj = new StdClass();
			foreach($a as $key => $val) {
				$obj->$key = $val;
			}

			$array[] = $obj;
		}

		return $array;
	}

	public static function exists($key, $value) {
		$count  = count(R::getAll("SELECT id FROM `users` WHERE `" . $key . "` = :value", array(":value" => $value)));

		if($count != 1) {
			return false;
		}

		return true;
	}

	public static function usersOnline() {
		$status = R::load('system', "online_count");
		return $status->value;
		//return count(R::getAll("SELECT * FROM `users` WHERE `online` = :online", array(":online" => "1")));
	}

	public static function create($data) {

		$user = R::dispense('users');
		$user->username = $data->field->regusername;
		$user->password = password($data->field->regpassword);
		$user->email = $data->field->regemail;
		$user->mission = "I'm a noob, help me out! :D";
		$user->last_online = time();
		$user->join_date = time();

		if(isset($_SESSION['register']['gender'])) {
			if($_SESSION['register']['gender'] == 'male') {
				$user->figure = Sierra::getConfig()->site->default_figures['male'];
			} elseif($_SESSION['register']['gender'] == 'female') {
				$user->figure = Sierra::getConfig()->site->default_figures['female'];
			}
		}

		$id = R::store($user);

		//$info = R::dispense('user_info');
		//$info->user_id = $id;
		//R::store($info);

		return $id;
	}
}