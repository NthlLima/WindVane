<?php
header("Content-Type: application/json; charset=UTF-8");

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname(dirname(dirname( __FILE__))) . '/assets/' );
}

require( ASSETSPATH . 'php/includes/class.php' );

$load  = new LoadPost;
$posts = $load->list();
$response["data"] = $posts;
echo json_encode($response);

?>