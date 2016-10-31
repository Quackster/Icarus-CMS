<?php
// http://www.xeweb.net/2010/01/15/simple-php-caching/
// Number of seconds a page should remain cached for
$cache_expires = 3600;

// Path to the cache folder
$cache_folder = "/var/www/icarus/cache/";

// Checks whether the page has been cached or not
function is_cached($file) {
	$cache_folder = "/var/www/icarus/cache/";
	$cache_expires = 3600;
	$cachefile = $cache_folder . $file;
	$cachefile_created = (file_exists($cachefile)) ? @filemtime($cachefile) : 0;
	return ((time() - $cache_expires) < $cachefile_created);
}

// Reads from a cached file
function read_cache($file) {
	$cache_folder = "/var/www/icarus/cache/";
	$cache_expires = 3600;
	$cachefile = $cache_folder . $file;
	return file_get_contents($cachefile);
}

// Writes to a cached file
function write_cache($file, $out) {
	
	$cache_folder = "/var/www/icarus/cache/";
	$cache_expires = 3600;
	$cachefile = $cache_folder . $file;
	$fp = fopen($cachefile, 'w');
	fwrite($fp, $out);
	fclose($fp);
}

?>