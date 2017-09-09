<?php

class Site {

	public static $config;
	public static $session;
	public $router;

	public function __construct() {
		$this->init();
		$this->fetch_files();

		define("URL", Site::getConfig()->site->url);

		$this->router = new Router();
		$this->doRoute();
	}

	public function init() {
		Site::$config = new StdClass();
		Site::$config->db = new StdClass();
		Site::$config->site = new StdClass();
		Site::$config->register = new StdClass();
		Site::$config->security = new StdClass();
		Site::$session = new StdClass();
		
		foreach($_SESSION as $key => $value) {
			if(is_array($value)) {
				Site::getSession()->$key = new StdClass();

				foreach($value as $skey => $svalue) {
					Site::getSession()->$key->$skey = $svalue;
				}
			} else {
				Site::getSession()->$key = $value;
			}
		}
	}

	public function doRoute() {

		if(isset($_GET['do'])) {
			if(empty($_GET['do'])) {
				$route = 'index';
			} else {
				$route = $_GET['do'];
			}
		} else {
			$route = 'index';
		}

		$process = $this->router->route('/' . $route);

		if($process) {
			$this->router->routeError($process);
		}
	}

	public function fetch_files() {

		// Config
		require_once "config.php";

		// Libraries
		require_once "application/libraries/router.php";
		require_once "application/libraries/session.php";
		require_once "application/libraries/functions.php";
		require_once "application/libraries/form.php";
		require_once "application/libraries/cache.php";

		// MVC Libraries
		require_once "application/base/model.php";
		require_once "application/base/view.php";
		require_once "application/base/controller.php";

		// External Libraries
		require_once "application/external/redbean.php";
		require_once "application/external/recaptchalib.php";

		// Router Config
		require_once "routes.php";

		// Data Access Objects (dao)
		require_once "application/dao/site.php";
		require_once "application/dao/user.php";
		require_once "application/dao/news.php";
		require_once "application/dao/hk.php";
		require_once "application/dao/campaign.php";
		
		// This file is generated by Composer
		// https://github.com/KnpLabs/php-github-api
	}

	public static function getConfig() {
		return Site::$config;
	}

	public static function getSession() {
		return Site::$session;
	}
}