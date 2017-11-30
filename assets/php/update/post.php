<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname(dirname(dirname(dirname( __FILE__ )))) . '/assets/' );
}

require( ASSETSPATH . 'php/dashboard.php' );

if (isset($_POST['inputTitulo']) 	  && !empty(str_replace(' ', '', $_POST['inputTitulo'])) 	  && 
	isset($_POST['summernote'])  	  && !empty(str_replace(' ', '', $_POST['summernote']))  	  && 
	isset($_POST['inputLink'])   	  && !empty(str_replace(' ', '', $_POST['inputLink']))   	  && # caso o link seja criado pela função comentar essa link
	isset($_POST['selectCategoria'])  && !empty(str_replace(' ', '', $_POST['selectCategoria']))  && 
	isset($_POST['nameCategoria'])    && !empty(str_replace(' ', '', $_POST['nameCategoria']))    && 
	isset($_POST['inputData'])   	  && !empty(str_replace(' ', '', $_POST['inputData']))   	  && 
	isset($_POST['textareaKeywords']) && !empty(str_replace(' ', '', $_POST['textareaKeywords'])) && 
	isset($_POST['idPostagem']) 	  && !empty(str_replace(' ', '', $_POST['idPostagem'])) 	  && 
	isset($_POST['inputSubmit'])      && !empty(str_replace(' ', '', $_POST['inputSubmit']))
){

	$id 	   = $_POST['idPostagem'];
	$titulo    = $_POST["inputTitulo"];
	$postagem  = $_POST["summernote"];
	$categoria = $_POST["selectCategoria"];

	# FORMATAR A DATA PARA O FORMATO DATETIME DO SLQ
	$hora  = date('H:i:s');
	$date  = $_POST["inputData"];
	$datetime = $date . ' ' . $hora;

	$df = new DateTime(strtotime($datetime));
	$data = $df->format('Y-m-d H:i:s');

	$datas = explode("/", $_POST["inputData"]);

	$date_update = date('Y-m-d H:i:s');
	

	$keywords  = $_POST["textareaKeywords"];
	$submit    = $_POST["inputSubmit"];



	# CASO O LINK SEJA FEITO DIRETAMENTE PELA FUNÇÃO
	if (!isset($_POST['inputLink'])) {

		$page = $titulo;
		$page = str_replace(" ","-",$page);
		$page = str_replace('.','',$page);
		$page = str_replace('"','',$page);
		$page = str_replace("'","",$page);
		$page = str_replace(",","",$page);
		$page = str_replace("%","",$page);
		$page = str_replace(";","",$page);
		$page = str_replace(":","",$page);
		$page = str_replace("”","",$page);
		$page = str_replace("“","",$page);
		$page = str_replace("?","",$page);
		$page = str_replace("!","",$page);
		$page = str_replace("/","",$page);
		$page = str_replace("+","",$page);
		$page = str_replace("*","",$page);
		$page = str_replace("[","",$page);
		$page = str_replace("]","",$page);
		$page = str_replace("{","",$page);
		$page = str_replace("}","",$page);
		$page = str_replace("º","",$page);
		$page = str_replace("ª","",$page);

		$Y = $datas[2];
		$m = $datas[1];
		$d = $datas[0];
		$categoria_nome = strtolower($_POST['nameCategoria']);

		$link  = $categoria_nome . '/noticias/' . $Y . '/' . $m . '/' . $d . '/' . $page . '.html';

	} else{
		$link = $_POST["inputLink"];	
	}


	if ($_POST['inputDestaque'] == true) {
		$destaque = 0;
	} else{
		$destaque = 1;
	}

	$autor = 1;

	$result = edit_post($autor, $titulo, $categoria, $link, $data, $date_update, $destaque, $postagem, $keywords, $submit, $id);

	if($result == 'true'){

		$response["return"]  = "success";
		$response["message"] = 'Postagem "'.$titulo.'"" atualizada com sucesso!';

		$description = "Atualizou '".$titulo."' em Postagem";
		$type = 2;

	} else{
		$response["return"]  = "danger";
		$response["message"] = 'Erro ao editar postagem';

		$description = $result;
		$type = 4;
	}

	$modified = "Postagem";
	$date = date('Y-m-d H:i:s');
	$user = 1;
	insert_timeline($modified, $description, $date, $type, $user);

} else{
	$response["return"]  = 'danger';
	$response["message"] = 'Dados não recebidos';
}

echo json_encode($response);

?>