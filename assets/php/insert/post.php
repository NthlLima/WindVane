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
	isset($_POST['inputSubmit'])      && !empty(str_replace(' ', '', $_POST['inputSubmit']))
){

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
		$destaque = 1;
	} else{
		$destaque = 0;
	}

	$autor = $_SESSION['wv.user'];

	$result = insert_post($autor, $titulo, $categoria, $link, $data, $destaque, $postagem, $keywords, $submit);

	if($result == 'true'){

		$idPostagem = search_id_postagem($link, $data, $autor, $submit);

		$response["return"]  = "success";
		$response["message"] = 'Postagem "'.$titulo.'"" criada com sucesso!';
		$response["idPostagem"]  = $idPostagem;

		$description = "Inseriu '".$titulo."' em Postagem";
		$type = 1;

	} else{
		$response["return"]  = "danger";
		$response["message"] = 'Erro ao criar postagem';

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