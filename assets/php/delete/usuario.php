<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname(dirname(dirname(dirname( __FILE__ )))) . '/assets/' );
}

require( ASSETSPATH . 'php/dashboard.php' );


if(isset($_POST['id'])  && !empty(str_replace(' ', '', $_POST['id'])) &&
   isset($_POST['user'])  && !empty(str_replace(' ', '', $_POST['user']))
){

	$id   = $_POST["id"];
	$user = $_POST["user"];
	$result = delete_user($id);

	if($result == 'true'){

		$response["return"]  = "success";
		$response["message"] = 'Usuário excluído com sucesso!';
		$description = "Excluiu Usuário: ".$user;
		$type = 3;

	} else{
		$response["return"]  = "warning";
		$response["message"] = 'Erro ao salvar dados';
		$description = $result;
		$type = 4;
	}

	$modified = "Usuário";
	$date = date('Y-m-d H:i:s');
	$user = $_SESSION['wv.user'];
	
	insert_timeline($modified, $description, $date, $type, $user);

} else{

	$response["return"]  = 'danger';
	$response["message"] = 'Dados não recebidos';

}

echo json_encode($response);


?>