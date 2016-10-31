<?php
ob_start();
session_start();

define("START", microtime(true));
define("APP_PATH", 'application');

/*
|--------------------------------------------------------------------------
| Fix IP addresses.
|--------------------------------------------------------------------------
*/
if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
	$_SERVER['HTTP_X_FORWARDED_FOR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
	$_SERVER['HTTP_CLIENT_IP'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
	$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
}

/*
|--------------------------------------------------------------------------
| Fix SSL detection.
|--------------------------------------------------------------------------
*/
if (isset($_SERVER['HTTP_CF_VISITOR'])) {
	if (preg_match('/https/i', $_SERVER['HTTP_CF_VISITOR'])) {
		$_SERVER['HTTPS'] = 'On';
		$_SERVER['HTTP_X_FORWARDED_PORT'] = 443;
		$_SERVER['SERVER_PORT'] = 443;
	}
}

require APP_PATH . "/core.php";
$Site = new Site();