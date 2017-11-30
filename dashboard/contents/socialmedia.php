<div class="dash-header">
	<h2>Social Media</h2>
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	     <li class="breadcrumb-item active" aria-current="page">Social Media</li>
	  </ol>
</div>


<div class="dash-main">
	<br>
	<div class="table-wrapper">
	<table class="table table-hove table-main">
	  <thead>
	    <tr>
	      <th scope="col">Nome</th>
	      <th scope="col">Contagem</th>
	      <th scope="col">Tipo de Contagem</th>
	      <th scope="col">Url</th>
	      <th scope="col">&nbsp;</th>
	      <th scope="col">&nbsp;</th>
	    </tr>
	  </thead>
	  <tbody id="table-list-media">
	  	<?php
	  		$list = list_social_media(0);
	  		foreach ($list as $media) {
	  			echo '
	  			<tr>
	  				<td>'.$media["nome"].'</td>
	  				<td>'.$media["count"].'</td>
	  				<td>'.$media["type"].'</td>
	  				<td>'.$media["url"].'</td>
	  				<td class="tab-link">'.$media["link"].'</td>
	  				<td class="tab-link">'.$media["config"].'</td>
	  			</tr>';
	  		}

	  	?>
	  </tbody>
	</table>
	</div>
	<div class="btn-group btn-group-sm float-right" role="group" aria-label="Pagination">
	  <button type="button" class="btn btn-light" id="load_social_media_newer">Próxima</button>
	  <button type="button" class="btn btn-light" id="load_social_media_older">Anterior</button>
	</div>
</div>