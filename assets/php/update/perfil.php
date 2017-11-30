<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname(dirname(dirname(dirname( __FILE__ )))) . '/assets/' );
}

require( ASSETSPATH . 'php/dashboard.php' );


if(isset($_POST['name'])  && !empty(str_replace(' ', '', $_POST['name']))  &&
   isset($_POST['email']) && !empty(str_replace(' ', '', $_POST['email'])) &&    
   isset($_POST['img'])   && !empty(str_replace(' ', '', $_POST['img']))     
){

	$user  = $_SESSION['wv.user'];
	$name  = $_POST["name"];
	$email = $_POST["email"];
	$img   = $_POST["img"];


	$result   = update_perfil($user, $name, $email, $img);

	if($result == 'true'){

		$response["return"]  = "success";
		$response["message"] = 'Usuário Editado com Sucesso';

	} else{
		$response["return"]  = "warning";
		$response["message"] = 'Erro ao salvar dados';
	}


} else{

	$response["return"]  = 'danger';
	$response["message"] = 'Dados não recebidos';

}

echo json_encode($response);


?>