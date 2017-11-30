<?php
header("Content-Type: application/json; charset=UTF-8");
include_once 'infos.php';

// IMAGEM 

$_UP['pasta'] = '../img/ebooks/';
$_UP['tamanho'] = 1024 * 1024 * 2;
$_UP['extensoes'] = array('jpg', 'png');
$_UP['renomeia'] = false;

$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

if ($_FILES['img']['error'] != 0) {

	$response['return'] = "danger";
	$response['msg'] 	= "Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['img']['error']];

} else {
	$extensao = pathinfo($_FILES["img"]["name"])['extension'];

	if (array_search($extensao, $_UP['extensoes']) === false) {
		$response['return'] = "danger";
		$response['msg'] 	= "Arquivo não está no formato JPG ou PNG";
	} else {

		if ($_UP['tamanho'] < $_FILES['img']['size']) {

			$response['return'] = "danger";
			$response['msg'] 	= "Arquivo muito grande , maior que 2 MB";

		} else {

			if ($_UP['renomeia'] == true) {

				$nome_final = md5(time()).'.'.$extensao;

			} else {

				$nome_final = $_FILES['img']['name'];

			}

			if (move_uploaded_file($_FILES['img']['tmp_name'], $_UP['pasta'].$nome_final)){
				$imglink = $host . 'assets/img/ebooks/' . $nome_final;
				$response['return'] = "success";
				$response['msg'] 	= $imglink;
				$response['name'] 	= $nome_final;

			} else {
				$response['return'] = "danger";
				$response['msg'] 	= "Erro ao salvar imagem";
			}

		}
	}
}

$response = json_encode($response);
echo $response;
?>