<?php

function dashboard(){

	require_once( 'contents/main.php' );

}


function get_sidebar($num){
	require_once( 'contents/sidebar.php' );
}

function get_page($page){
	require_once( 'contents/dashboard.php' );
}

?>