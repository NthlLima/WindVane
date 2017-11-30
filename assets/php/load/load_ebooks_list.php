<?php
header("Content-Type: application/json; charset=UTF-8");

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname(dirname(dirname(dirname( __FILE__ )))) . '/assets/' );
}

require( ASSETSPATH . 'php/dashboard.php' );

$inicio = $_POST["num"];

$ebooks = list_ebook($inicio);

echo json_encode($ebooks);


?>
