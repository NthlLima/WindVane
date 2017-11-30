<?php

require( ASSETSPATH . '/php/includes/class.php' );


function load_featured($start, $limit){

	$load  = new LoadPost;
	$posts = $load->featured($start, $limit);
	$i = 0;

	foreach ($posts as $p) {

		$date = date_create($p["data"]);
		$data = date_format($date,"d/m/Y");
		$p["data"] = $data;

		$content = $p["content"];
		$new_content = between('src="', '"', $content);
		$p["content"] = $new_content;

		$content = strip_tags($content);
		$resumo  = criaResumo($content, 140);
		$p["resumo"] = $resumo;

		$posts[$i] = $p;



		$i++;
		
	}


	return $posts;
}

function load_latest($start, $limit){

	$load  = new LoadPost;
	$posts = $load->latest($start, $limit);
	$i = 0;

	foreach ($posts as $p) {

		$date = date_create($p["data"]);
		$data = date_format($date,"d/m/Y");
		$p["data"] = $data;

		$content = $p["content"];
		$new_content = between('src="', '"', $content);
		$p["content"] = $new_content;

		$content = strip_tags($content);
		$resumo  = criaResumo($content, 180);
		$p["resumo"] = $resumo;

		$posts[$i] = $p;

		$i++;
		
	}


	return $posts;
}

function load_post($url){

	$load = new LoadPost;
	$post = $load->post($url);

	if ($post != false) {

		$date = date_create($post["data"]);
		$data = date_format($date,"d/m/Y");
		$post["data"] = $data;

		$content = $post["content"];
		$new_content = between('src="', '"', $content);
		$post["img"] = $new_content;

		$content = strip_tags($content);
		$resumo  = criaResumo($content, 180);
		$post["resumo"] = $resumo;

	}

	return $post;

}

function load_category_featured($categ){

	$load  = new LoadPost;
	$posts = $load->category_featured($categ);
	$i = 0;

	foreach ($posts as $p) {

		$date = date_create($p["data"]);
		$data = date_format($date,"d/m/Y");
		$p["data"] = $data;

		$content = $p["content"];
		$new_content = between('src="', '"', $content);
		$p["content"] = $new_content;

		$content = strip_tags($content);
		$resumo  = criaResumo($content, 140);
		$p["resumo"] = $resumo;

		$posts[$i] = $p;



		$i++;
		
	}

	return $posts;
}

function load_category_latest($categ){

	$load  = new LoadPost;
	$posts = $load->category_latest($categ);
	$i = 0;

	foreach ($posts as $p) {

		$date = date_create($p["data"]);
		$data = date_format($date,"d/m/Y");
		$p["data"] = $data;

		$content = $p["content"];
		$new_content = between('src="', '"', $content);
		$p["content"] = $new_content;

		$content = strip_tags($content);
		$resumo  = criaResumo($content, 140);
		$p["resumo"] = $resumo;

		$posts[$i] = $p;

		$i++;
		
	}


	return $posts;
}

function search_category($url){

	$search = new Search;
	$categ  = $search->category($url);

	return $categ;
}

function load_latest_date_and_category($dateB, $dateE, $categ){

	$load  = new LoadPost;
	$posts = $load->category_latest_date($dateB, $dateE, $categ);
	$i = 0;

	foreach ($posts as $p) {

		$date = date_create($p["data"]);
		$data = date_format($date,"d/m/Y");
		$p["data"] = $data;

		$content = $p["content"];
		$new_content = between('src="', '"', $content);
		$p["content"] = $new_content;

		$content = strip_tags($content);
		$resumo  = criaResumo($content, 140);
		$p["resumo"] = $resumo;

		$posts[$i] = $p;

		$i++;
		
	}


	return $posts;
}


function load_ebook(){

	$search = new LoadEbooks;
	$ebook  = $search->active();

	return $ebook;

}

function load_social_media(){

	$search = new LoadSocialMedia;
	$medias = $search->all();

	return $medias;

}
?>