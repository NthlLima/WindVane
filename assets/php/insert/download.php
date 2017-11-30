<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname(dirname(dirname(dirname( __FILE__ )))) . '/assets/' );
}

require( ASSETSPATH . 'php/dashboard.php' );


if(isset($_POST['ebook'])  && !empty(str_replace(' ', '', $_POST['ebook']))){
	$ebook   = $_POST["ebook"];
	insert_download($ebook);
	
} 



?>