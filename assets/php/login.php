<?php
header("Content-Type: application/json; charset=UTF-8");

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname(dirname(dirname( __FILE__))) . '/assets/' );
}

require( ASSETSPATH . 'php/dashboard.php' );


if(isset($_POST['password']) && !empty(str_replace(' ', '', $_POST['password'])) &&
   isset($_POST['email'])    && !empty(str_replace(' ', '', $_POST['email']))       
){

	$email    = $_POST["email"];
	$password = $_POST["password"];
	
	$result   = login($email, $password);

	if($result == 'true'){
		$response["return"]  = "success";

	} else{
		$response["return"]  = "danger";
		$response["message"] = $result;
	}

} else{

	$response["return"]  = 'danger';
	$response["message"] = 'Dados não recebidos';

}

echo json_encode($response);


?>