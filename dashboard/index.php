<?php
session_start();

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname(dirname(__FILE__)) . '/assets/' );
}

require_once( ASSETSPATH . 'php/dashboard.php' );

if (!isset($_SESSION['wv.user']) || empty($_SESSION['wv.user'])) {
	if (basename($_SERVER['REQUEST_URI']) != 'login') {
		header("location:/dashboard/login/");
	} else {
		require_once( 'contents/login.php' );
	}
} else{
	if (basename($_SERVER['REQUEST_URI']) == 'login') {
		header("location:/dashboard/");
	} else{
		require_once( 'contents/main.php' );	
	}
}

?>