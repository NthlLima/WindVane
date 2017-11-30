<?php

require_once( ASSETSPATH . '/php/load.php' );

function load_main_page(){

	$title = 'Agência de marketing digital Recife | Logus Tech';


	require( ASSETSPATH . '/includes/contents/head.php');
	require( ASSETSPATH . '/includes/contents/header.php');
	require( ASSETSPATH . '/includes/contents/body.php');
	require( ASSETSPATH . '/includes/contents/footer.php');
	require( ASSETSPATH . '/includes/contents/includes/main.php');
	
}

function load_blog_page(){

	$title = 'Agência de marketing digital Recife | Logus Tech Blog';


	require( ASSETSPATH . '/includes/contents/head.php');
	require( ASSETSPATH . '/includes/contents/header_blog.php');
	require( ASSETSPATH . '/includes/contents/blog.php');
	require( ASSETSPATH . '/includes/contents/footer.php');
	require( ASSETSPATH . '/includes/contents/includes/blog.php');

	
}

function load_post_page($post){

	$title = $post["title"] . '| Logus Tech';

	require( ASSETSPATH . '/includes/contents/head.php');
	require( ASSETSPATH . '/includes/contents/header_article.php');
	require( ASSETSPATH . '/includes/contents/article.php');
	require( ASSETSPATH . '/includes/contents/footer.php');

}

function load_category_page($url, $category){

	$title = ucfirst(basename($url)) . ' | Logus Tech';
	require( ASSETSPATH . '/includes/contents/head.php');
	require( ASSETSPATH . '/includes/contents/navbar.php');
	require( ASSETSPATH . '/includes/contents/category.php');
	require( ASSETSPATH . '/includes/contents/footer.php');
	
}

function load_latest_date_category($dateB, $dateE, $categ){

	$title = 'Logus Tech';


	require( ASSETSPATH . '/includes/contents/head.php');
	require( ASSETSPATH . '/includes/contents/navbar.php');
	require( ASSETSPATH . '/includes/contents/latest.php');
	require( ASSETSPATH . '/includes/contents/footer.php');

}

function load_not_found(){

	$title = 'Página Não Encontrada | Logus Tech';
	require( ASSETSPATH . '/includes/contents/head.php');
	require( ASSETSPATH . '/includes/contents/navbar.php');
	require( ASSETSPATH . '/includes/contents/404.php');
	require( ASSETSPATH . '/includes/contents/footer.php');
}

function load_static_page($url){

	$post = load_post($url);

	if ($post != false) {
		load_post_page($post);
	} else{
		
		$link = explode("/", $url);

		if (count($link) > 1 && $link[1] != "") {
			
			$tam = count($link);

			for ($i = 0; $i < $tam; $i++) { 
				
				if ($i == 0) {
					$category = search_category($link[$i]);
					if ($category == false) {
						break;
					}
				} else if ($i == 1) {
					if ($link[$i] != "noticias") {
						break;
					}
				} else if ($i == 2 && $link[$i] != ""){
					if (checkdate(01, 01, $link[$i])) {
						$ano = $link[$i];
					} else {
						break;
					}
				} else if ($i == 3 && $link[$i] != ""){
					if (checkdate(01, $link[$i], $ano)) {
						$mes = $link[$i];
					} else {
						break;
					}
				} else if ($i == 4 && $link[$i] != ""){
					if (checkdate($link[$i], $mes, $ano)) {
						$dia = $link[$i];
					} else {
						break;
					}
				} else if ($i == 5){
					if ($link[$i] != "") {
						break;
					}
				}
			}

			if ($i != $tam) {

				load_not_found();

			} else{
				if (!isset($dia) && isset($mes) && isset($ano)) {
					$dateB = $ano."-".$mes."-01" . ' 00:00:00';
					$dateE = $ano."-".$mes."-31" . ' 23:59:59';
					load_latest_date_category($dateB, $dateE , $category);
				} else if(!isset($dia) && !isset($mes) && isset($ano)){
					$dateB = $ano."-01-01" . ' 00:00:00';
					$dateE = $ano."-12-31" . ' 23:59:59';
					load_latest_date_category($dateB, $dateE , $category);
				} else if(isset($dia) && isset($mes) && isset($ano)){
					$dateB = $ano."-".$mes."-".$dia . ' 00:00:00';
					$dateE = $ano."-".$mes."-".$dia . ' 23:59:59';
					load_latest_date_category($dateB, $dateE , $category);
				} else{
					load_not_found();
				}

			}

		} else{
			$category = search_category(basename($url));

			if ($category != false) {
				load_category_page($url, $category);
			} else{
				load_not_found();
			}
		}
	}

}

?>