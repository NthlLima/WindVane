<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname(dirname(dirname(dirname( __FILE__ )))) . '/assets/' );
}

require( ASSETSPATH . 'php/dashboard.php' );


if(isset($_POST['oldpass'])  && !empty(str_replace(' ', '', $_POST['oldpass']))  &&
   isset($_POST['newpass']) && !empty(str_replace(' ', '', $_POST['newpass'])) &&    
   isset($_POST['reppass'])   && !empty(str_replace(' ', '', $_POST['reppass']))     
){

	$user    = $_SESSION['wv.user'];
	$oldpass = $_POST["oldpass"];
	$newpass = $_POST["newpass"];
	$reppass = $_POST["reppass"];

	if($newpass != $reppass) {
		$response['return']  = "danger";
		$response['message'] = "Senha incompátiveis<br>Opa! As senhas devem ser iguais";
	} else if(strlen($newpass) < 4) {
		$response['return']  = "danger";
		$response['message'] = "Senha inválida<br>A senha deve ter no mínimo 4 caracteres";
	} else{

		$result   = update_password($user, $oldpass, $newpass);

			if($result == 'true'){

				$response["return"]  = "success";
				$response["message"] = 'Senha Editada com Sucesso';

			} else{
				$response["return"]  = "warning";
				$response["message"] = $result;
			}
	}


} else{

	$response["return"]  = 'danger';
	$response["message"] = 'Dados não recebidos';

}

echo json_encode($response);


?>