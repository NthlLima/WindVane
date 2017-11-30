<?php

if ( ! defined( 'ASSETSPATH' ) ) {
	define( 'ASSETSPATH', dirname( __FILE__ ,4) . '/assets/' );
	require_once( ASSETSPATH . '/includes/load.php' );
}


$start = (isset($_POST['start'])) ? $_POST['start'] : 0 ;
$limit = (isset($_POST['limit'])) ? $_POST['limit'] : 6 ;

	$latest = load_latest($start , $limit);
	
	$tam = count($latest);
	$html = '';

	for ($i = 0; $i < $tam; $i++) { 
		
		for ($j = 0; $j < 1; $j++) { 
			$html = $html . '
			<article class="card card-first">
			    <img class="card-img-top" src="'.$latest[$i]["content"].'" alt="'.$latest[$i]["title"].'">
			    <div class="card-body">
			    	<h5 class="card-tag">Categoria</h5>
			      	<a href="'.$latest[$i]["link"].'"><h4 class="card-title">'.$latest[$i]["title"].'</h4></a>
			      	<p class="card-text">'.$latest[$i]["resumo"].'</p>
			    </div>
			  </article>';

			  $i++;
			  
			  if($i >= $tam) break;
		}

		if($i >= $tam) break;
		$html = $html . '<div class="card-deck card-deck-tree">';
		for ($j = 0; $j < 3; $j++) { 
			$html = $html . '
			<article class="card">
			    <img class="card-img-top" src="'.$latest[$i]["content"].'" alt="'.$latest[$i]["title"].'">
			    <div class="card-body">
			    	<h5 class="card-tag">Categoria</h5>
			      	<a href="'.$latest[$i]["link"].'"><h4 class="card-title">'.$latest[$i]["title"].'</h4></a>
			      	<p class="card-text">'.$latest[$i]["resumo"].'</p> 
			    </div>
			</article>';

			$i++;
			if($i >= $tam) break;

		}
		$html = $html . '</div>';
		if($i >= $tam) break;

		$html = $html . '<div class="card-deck">';

		for ($j = 0; $j < 2; $j++) { 
			$html = $html . '
			<article class="card">
			    <img class="card-img-top" src="'.$latest[$i]["content"].'" alt="'.$latest[$i]["title"].'">
			    <div class="card-body">
			    	<h5 class="card-tag">Categoria</h5>
			      	<a href="'.$latest[$i]["link"].'"><h4 class="card-title">'.$latest[$i]["title"].'</h4></a>
			      	<p class="card-text">'.$latest[$i]["resumo"].'</p>
			    </div>
			</article>';

			$i++;
			if($i >= $tam) break;

		}

		$html = $html . '</div>';
		if($i >= $tam) break;
		$i--;
		
	}

echo $html;
?>