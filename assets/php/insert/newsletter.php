<?php
header("Content-Type: application/json; charset=UTF-8");

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname(dirname(dirname(dirname( __FILE__ )))) . '/assets/' );
}

require( ASSETSPATH . 'php/dashboard.php' );


if(isset($_POST['nome'])  && !empty(str_replace(' ', '', $_POST['nome'])) &&
   isset($_POST['email']) && !empty(str_replace(' ', '', $_POST['email']))
){

	$nome   = $_POST["nome"];
	$email  = $_POST["email"];
	$result = insert_newsletter($nome, $email);

	// ENVIAR EMAIL

	if($result == 'true'){

		$response["return"]  = 'success';
		$response["title"]   = 'Seja Bem-vindo à Logustech!';
		$response["message"] = 'O Nosso E-book será baixado automaticamente, caso não, acesse o seu email cadastrado para resgatar.';

	} else{
		$response["return"]  = 'error';
		$response["title"]   = 'Ocorreu um Erro';
		$response["message"] = 'Ocorreu um erro na captura do seu email. Por favor tente mais tarde!';
		$response["error"]   = $result;
	}

} else{

	$response["return"]  = 'warning';
	$response["title"]   = 'Dados não recebidos';
	$response["message"] = 'Ops! Seus dados não foram recebidos, por favor tente novamente!';

}

echo json_encode($response);


?>