<?php
//Class Autoloader
spl_autoload_register(function ($className) {

    $className = strtolower($className);

    $path = ASSETSPATH . "php/includes/{$className}.php";
    $db = ASSETSPATH . "php/database/{$className}.php";


    if (file_exists($path)) {

        require_once($path);

    } else if(file_exists($db)){

    	require_once($db);

    } else {

        die("The file {$className}.php could not be found.");

    }
});

function mySqlErrors($response){
	switch (substr($response, 0, 22)) {
	    case 'Error: SQLSTATE[23000]':
	        $msg = "Email já cadastrado";
	        break;
	    default:
	        $msg = "Ocorreu um erro ao inserir novo usuário";
	}

	return $msg;
}

function after ($esse, $inthat){
    if (!is_bool(strpos($inthat, $esse)))
    return substr($inthat, strpos($inthat,$esse)+strlen($esse));
};

function after_last ($esse, $inthat){
    if (!is_bool(strrevpos($inthat, $esse)))
    return substr($inthat, strrevpos($inthat, $esse)+strlen($esse));
};

function before ($esse, $inthat){
    return substr($inthat, 0, strpos($inthat, $esse));
};

function before_last ($esse, $inthat){
    return substr($inthat, 0, strrevpos($inthat, $esse));
};

function between ($esse, $aquele, $inthat){
    return before ($aquele, after($esse, $inthat));
};

function between_last ($esse, $aquele, $inthat){
    return after_last($esse, before_last($aquele, $inthat));
};

function strrevpos($instr, $needle){
    $rev_pos = strpos (strrev($instr), strrev($needle));
    if ($rev_pos===false) return false;
    else return strlen($instr) - $rev_pos - strlen($needle);
}


function criaResumo($string,$caracteres) { 
    $string = strip_tags($string); 
    if (strlen($string) > $caracteres) { 
        while (substr($string,$caracteres,1) <> ' ' && ($caracteres < strlen($string))) { 
            $caracteres++; 
        } 
    }

    return substr($string,0,$caracteres) . '...'; 
}

?>