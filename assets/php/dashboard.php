<?php

require( ASSETSPATH . 'php/includes/class.php' );
require( ASSETSPATH . 'php/wv-config.php' );


function get_site_name(){
	return SITE_NAME;
}

function login($email, $password){

	$auth   = new Auth;
	$result = $auth->login($email, $password);
	return $result;

}

// LOADS 

function list_post($inicio){

	$load  = new LoadPost;
	$posts = $load->list($inicio);
	
	return $posts;

}

function list_post_total(){
	$load  = new LoadPost;
	$count = $load->count_list();
	
	return $count;
}

function list_category($inicio){

	$load  = new LoadCategory;

	if ($inicio == -1) {
		$cats  = $load->all();
	} else{
		$cats  = $load->list($inicio);	
	}

	return $cats;
}


function list_ebook($inicio){
	
	$load  = new LoadEbooks;
	$ebook = $load->list($inicio);
	
	return $ebook;
}

function list_social_media($inicio){
	
	$load  = new LoadSocialMedia;
	$ebook = $load->list($inicio);
	
	return $ebook;
}

function list_social_media_total(){
	$load  = new LoadSocialMedia;
	$count = $load->count_list();
	
	return $count;
}

function list_ebook_total(){
	$load  = new LoadEbooks;
	$count = $load->count_list();
	
	return $count;
}

function list_category_total(){
	$load  = new LoadCategory;
	$count = $load->count_list();
	
	return $count;
}

function list_users($inicio){
	
	$load  = new LoadUser;
	$posts = $load->list($inicio);
	
	return $posts;
}

function list_user_total(){
	$load  = new LoadUser;
	$count = $load->count_list();
	
	return $count;
}

// INSERTS

function insert_category($name){

	$insert = new InsertValues();
	$result = $insert->category($name);

	return $result;
}

function insert_timeline($modified, $description, $date, $type, $user){

	$insert = new InsertValues();
	$result = $insert->timeline($modified, $description, $date, $type, $user);
	
}

function insert_post($autor, $titulo, $categoria, $link, $data, $destaque, $postagem, $keywords, $submit){

	$insert = new InsertValues();
	$result = $insert->post($autor, $titulo, $categoria, $link, $data, $destaque, $postagem, $keywords, $submit);

	return $result;

}

function insert_user($username, $email, $password, $funcao){

	$img = "/assets/img/perfil/user_default.png";

	$insert = new InsertValues();
	$result = $insert->user($username, $email, $password, $funcao, $img);

	return $result;

}

function insert_newsletter($nome, $email){

	$insert = new InsertValues();
	$result = $insert->newsletter($nome, $email);

	return $result;

}

function insert_ebook($pdf, $img, $name, $namePDF){

	$insert = new InsertValues();
	$result = $insert->ebook($pdf, $img, $name, $namePDF);

	return $result;

}

function insert_download($ebook){

	$insert = new InsertValues();
	$insert->download($ebook);

}
// EDIT

function update_perfil($user, $name, $email, $img){

	$update  = new Auth;
	$result  = $update->update($user, $name, $email, $img);
	
	return $result;

}

function update_password($user, $oldpass, $newpass){

	$update = new Auth;

	$verify = $update->auth_password($user, $oldpass);
	if($verify == 'true'){
		$password = password_hash($newpass, PASSWORD_DEFAULT);
		$result = $update->password($user, $password);
	} else{
		$result = $verify;
	}
	
	return $result;

}


function get_edit_post($id){

	$load  = new LoadPost;
	$post  = $load->edit($id);
	
	return $post;

}

function edit_post($autor, $titulo, $categoria, $link, $data, $date_update, $destaque, $postagem, $keywords, $submit, $id){

	$update = new UpdateValues();
	$result = $update->post($autor, $titulo, $categoria, $link, $data, $date_update, $destaque, $postagem, $keywords, $submit, $id);

	return $result;

}

function update_user($id, $func){

	$update = new UpdateValues();
	$result = $update->user($id, $func);

	return $result;
}


// DELETE

function delete_category($id){

	$delete = new DeleteValues();
	$result = $delete->category($id);

	return $result;
}

function delete_post($id){

	$delete = new DeleteValues();
	$result = $delete->post($id);

	return $result;
}

function delete_user($id){

	$delete = new DeleteValues();
	$result = $delete->user($id);

	return $result;
}


function search_id_postagem($link, $data, $autor, $submit){

	$load = new LoadPost;
	$id   = $load->id($link, $data, $autor, $submit);
	
	return $id;

}

?>