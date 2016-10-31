<?php

class Session {
	public static function auth() {
		if(Session::isAuthed()) {
			return UserDao::get(Site::getSession());
		} else {
			return null;
		}
	}

	public static function isAuthed() {
		if(isset(Site::getSession()->auth)) {
			if(is_numeric(Site::getSession()->auth)) {
				return true;
			}
			return false;
		}
		return false;
	}
	
	public static function hasHousekeeping() {
		if(Session::auth()->rank >= Site::getConfig()->site->housekeeping_rank)
			return true;
		else
			return false;
	}

	public static function getAuth() {
		return (isset(Site::getSession()->auth) ? Site::getSession()->auth : null);
	}

	public static function set($id) {
		$_SESSION['auth'] = $id;
	}

	public static function setOwn($key, $value) {
		$_SESSION[$key] = $value;
	}

	public static function deAuth() {
		unset($_SESSION['auth']);
	}

	public static function destroy() {
		session_destroy();
	}
	
	public static function is_auth() {
		return isset($_SESSION['auth']);
	}

	public static function kill($key) {
		unset($_SESSION[$key]);
	}
}