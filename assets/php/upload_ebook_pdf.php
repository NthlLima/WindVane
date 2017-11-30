<?php
header("Content-Type: application/json; charset=UTF-8");
include_once 'infos.php';

// INFOS

$_UP['pasta'] = '../../downloads/ebooks/';
$_UP['tamanho'] = 1024 * 1024 * 2;
$_UP['extensoes'] = array('pdf','PDF','html','HTML');
$_UP['renomeia'] = false;
// ERRORS
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

if ($_FILES['arquivo']['error'] != 0){

  	$response['return'] = "danger";
	$response['msg'] 	= "Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['arquivo']['error']];

} else{
	$extensao = pathinfo($_FILES["arquivo"]["name"])['extension'];

	if(array_search($extensao, $_UP['extensoes']) === false){
		$response['return'] = "danger";
		$response['msg'] 	= "Arquivo não está no formato PDF";
	} else 

		if ($_UP['tamanho'] < $_FILES['arquivo']['size']){

	  		$response['return'] = "danger";
			$response['msg'] 	= "Arquivo muito grande , maior que 2 MB";

		} else {

			if ($_UP['renomeia'] == true){

				$nome_final = md5(time()).'.'.$extensao;

			} else {

				$nome_final = $_FILES['arquivo']['name'];

			}

			if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)){
				$pdflink = $host . 'downloads/ebooks/' . $nome_final;
				$response['return'] = "success";
				$response['msg'] 	= $pdflink;
				$response['name'] 	= $nome_final;

			} else {
				$response['return'] = "danger";
				$response['msg'] 	= "Erro ao salvar PDF";
			}


	}
}

$response = json_encode($response);
echo $response;
?>