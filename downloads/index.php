<?php

$ebook = basename($_SERVER['REQUEST_URI']);

$url = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/assets/php/insert/download.php";
$data = array('ebook' => urlencode($ebook));
$query = "ebook=".urlencode($ebook);
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch,CURLOPT_POST,count($data));
curl_setopt($ch,CURLOPT_POSTFIELDS,$query);
$resultado = curl_exec($ch);
curl_close($ch);

header("Content-type:application/pdf");
header("Content-Disposition:attachment;filename='" . $ebook . "'");
readfile("ebooks/" . $ebook);
?>