<?php
/*
Plugin Name: Localhost Reverse Proxy Plugin
Plugin URI: http://opensource.parisholley.com/
Description: Enables localhost development of wordpress when using multisite and domain mapping plugin without the need for client /etc/host entries.
Version: 1.0.0
Author: Paris Holley
Author URI: http://parisholley.com/
*/

if( $_SERVER['HTTP_X_FORWARDED_HOST'] && strpos($_SERVER['HTTP_X_FORWARDED_HOST'], ':') !== false ){
	define('COOKIE_DOMAIN', '');

	// disable forcing of network admin domain checking
	add_filter('redirect_network_admin_request', function(){
		return false;
	});

	add_filter('login_url', function(){
		return "http://" . $_SERVER['HTTP_X_FORWARDED_HOST'] . "/wp-login.php";
	});

	add_filter('admin_url', function($url, $path){
		return "http://" . $_SERVER['HTTP_X_FORWARDED_HOST'] . "/wp-admin/" . $path;
	}, 11, 2);

	add_filter('network_site_url', function($url, $path){
		return "http://" . $_SERVER['HTTP_X_FORWARDED_HOST'] . "/" . $path;
	}, 10, 2);

	add_filter('site_url', function($url, $path){
		return "http://" . $_SERVER['HTTP_X_FORWARDED_HOST']  . "/" . $path;
	}, 10, 2);

	add_filter('content_url', function($url, $path){
		return "http://" . $_SERVER['HTTP_X_FORWARDED_HOST'] . "/wp-content" . $path;
	}, 10, 2);
}
?>
