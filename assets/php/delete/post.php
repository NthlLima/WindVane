<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname(dirname(dirname(dirname( __FILE__ )))) . '/assets/' );
}

require( ASSETSPATH . 'php/dashboard.php' );


if(isset($_POST['id'])  && !empty(str_replace(' ', '', $_POST['id']))
){

	$id   	= $_POST["id"];
	$result = delete_post($id);

	if($result == 'true'){

		$response["return"]  = "success";
		$response["message"] = 'Postagem excluída com sucesso!';
		$description = "Excluiu Postagem de id:".$id;
		$type = 3;

	} else{
		$response["return"]  = "warning";
		$response["message"] = 'Erro ao salvar dados';
		$description = $result;
		$type = 4;
	}

	$modified = "Postagem";
	$date = date('Y-m-d H:i:s');
	$user = $_SESSION['wv.user'];
	
	insert_timeline($modified, $description, $date, $type, $user);

} else{

	$response["return"]  = 'danger';
	$response["message"] = 'Dados não recebidos';

}

echo json_encode($response);


?>