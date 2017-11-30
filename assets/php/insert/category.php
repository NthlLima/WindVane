<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname(dirname(dirname(dirname( __FILE__ )))) . '/assets/' );
}

require( ASSETSPATH . 'php/dashboard.php' );


if(isset($_POST['categoria'])  && !empty(str_replace(' ', '', $_POST['categoria']))
){

	$name   = $_POST["categoria"];
	$result = insert_category($name);

	if($result == 'true'){

		$response["return"]  = "success";
		$response["message"] = 'Categoria '.$name.' adicionada com sucesso!';
		$description = "Inseriu '".$name."' em Categorias";
		$type = 1;

	} else{
		$response["return"]  = "warning";
		$response["message"] = 'Erro ao salvar dados';
		$description = $result;
		$type = 4;
	}

	$modified = "Categoria";
	$date = date('Y-m-d H:i:s');
	$user = $_SESSION['wv.user'];
	insert_timeline($modified, $description, $date, $type, $user);

} else{

	$response["return"]  = 'danger';
	$response["message"] = 'Dados não recebidos';

}

echo json_encode($response);


?>