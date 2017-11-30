<?php

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname( __FILE__ ) . '/assets/' );
}

require_once( ASSETSPATH . '/includes/load.php' );

if ( $_SERVER['REQUEST_URI'] == '/' ){

	load_main_page();

} else if ( $_SERVER['REQUEST_URI'] == '/blog' ){

	load_blog_page();

} else {

	$url = substr(urldecode($_SERVER['REQUEST_URI']),1);
	load_static_page($url);

}
?>