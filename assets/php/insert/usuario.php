<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname(dirname(dirname(dirname( __FILE__ )))) . '/assets/' );
}

require( ASSETSPATH . 'php/dashboard.php' );


if(isset($_POST['username']) && !empty(str_replace(' ', '', $_POST['username'])) &&
   isset($_POST['email'])    && !empty(str_replace(' ', '', $_POST['email']))    &&
   isset($_POST['pass'])     && !empty(str_replace(' ', '', $_POST['pass']))     &&
   isset($_POST['reppass'])  && !empty(str_replace(' ', '', $_POST['reppass']))  &&
   isset($_POST['funcao'])   && !empty(str_replace(' ', '', $_POST['funcao']))   
){

	$username = $_POST["username"];
	$email    = $_POST["email"];
	$pass     = $_POST["pass"];
	$reppass  = $_POST["reppass"];
	$funcao   = $_POST["funcao"];

	if($pass != $reppass) {
		$response['return']  = "danger";
		$response['message'] = "Senha incompátiveis<br>Opa! As senhas devem ser iguais";
	} else if(strlen($pass) < 4) {
		$response['return']  = "danger";
		$response['message'] = "Senha inválida<br>A senha deve ter no mínimo 4 caracteres";
	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
		$response['return']  = "danger";
		$response['message'] = "Email inválido<br>Deve inserir um endereço de e-mail válido";

	} else {
		$password = password_hash($pass, PASSWORD_DEFAULT);
		$result   = insert_user($username, $email, $password, $funcao);

		if($result == 'true'){

			$response["return"]  = "success";
			$response["message"] = 'Usuário Criado com Sucesso';
			$description = "Inseriu um novo Usuário";
			$type = 1;

		} else{
			$response["return"]  = "warning";
			$response["message"] = 'Erro ao salvar dados';
			$description = $result;
			$type = 4;
		}

		$modified = "Usuario";
		$date = date('Y-m-d H:i:s');
		$user = $_SESSION['wv.user'];
		insert_timeline($modified, $description, $date, $type, $user);

	}


} else{

	$response["return"]  = 'danger';
	$response["message"] = 'Dados não recebidos';

}

echo json_encode($response);


?>