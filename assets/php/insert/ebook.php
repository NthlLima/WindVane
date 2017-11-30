<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname(dirname(dirname(dirname( __FILE__ )))) . '/assets/' );
}

require( ASSETSPATH . 'php/dashboard.php' );


if(isset($_POST['pdf'])  && !empty(str_replace(' ', '', $_POST['pdf'])) && 
   isset($_POST['namePDF'])  && !empty(str_replace(' ', '', $_POST['namePDF'])) &&
   isset($_POST['img'])  && !empty(str_replace(' ', '', $_POST['img'])) &&
   isset($_POST['name']) && !empty(str_replace(' ', '', $_POST['name']))
){

	$pdf    = $_POST["pdf"];
	$img    = $_POST["img"];
	$name   = $_POST["name"];
	$namePDF   = $_POST["namePDF"];
	$result = insert_ebook($pdf, $img, $name, $namePDF);

	if($result == 'true'){

		$response["return"]  = "success";
		$response["message"] = 'Ebook '.$name.' adicionado com sucesso!';
		$description = "Adicionou um novo Ebook '".$name."'";
		$type = 1;

	} else{
		$response["return"]  = "warning";
		$response["message"] = 'Erro ao salvar dados';
		$description = $result;
		$type = 4;
	}

	$modified = "Ebook";
	$date = date('Y-m-d H:i:s');
	$user = $_SESSION['wv.user'];
	insert_timeline($modified, $description, $date, $type, $user);

} else{

	$response["return"]  = 'danger';
	$response["message"] = 'Dados não recebidos';

}

echo json_encode($response);


?>