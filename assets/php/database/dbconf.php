<?php

require( dirname(dirname(dirname(dirname(__FILE__)))) . '/assets/php/wv-config.php' );

$host = DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;
$db_name = DB_NAME;


$tbl_prefix = DB_PREFIX;
$tbl1 = $tbl_prefix."users";
$tbl2 = $tbl_prefix."userstype";
$tbl3 = $tbl_prefix."categorys";
$tbl4 = $tbl_prefix."posts";
$tbl5 = $tbl_prefix."timeline";
$tbl6 = $tbl_prefix."newsletter";
$tbl7 = $tbl_prefix."ebooks";
$tbl8 = $tbl_prefix."social_media";
?>
