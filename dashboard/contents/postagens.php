<div class="dash-header">
	<h2>Postagens</h2>
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	     <li class="breadcrumb-item active" aria-current="page">Postagens</li>
	  </ol>
</div>
 
<div class="dash-main">
	<div class="dash-buttons">
		<a href="dashboard/postagens/novapostagem/"><button type="button" class="btn btn-jftv btn-sm">Nova Postagem</button></a>
		<button type="button" class="btn btn-jftv btn-sm" data-toggle="modal" data-target="#modalCategorias">Categorias</button>
	</div>
	<br>
	<div class="table-wrapper">
	<table class="table table-hove table-main">
	  <thead>
	    <tr>
	      <th scope="col">Título</th>
	      <th scope="col">Categoria</th>
	      <th scope="col">Autor</th>
	      <th scope="col">Data</th>
	      <th scope="col">&nbsp;</th>
	      <th scope="col">&nbsp;</th>
	      <th scope="col">&nbsp;</th>
	    </tr>
	  </thead>
	  <tbody id="table-list-post">
	  	<?php
	  		$list = list_post(0);
	  		foreach ($list as $post) {
	  			echo '
	  			<tr>
	  				<td>'.$post["title"].'</td>
	  				<td>'.$post["category"].'</td>
	  				<td>'.$post["author"].'</td>
	  				<td>'.$post["data"].'</td>
	  				<td class="tab-link">'.$post["edit"].'</td>
	  				<td class="tab-link">'.$post["delete"].'</td>
	  				<td class="tab-link">'.$post["link"].'</td>
	  			</tr>';
	  		}

	  	?>
	  </tbody>
	</table>
	</div>
	<div class="btn-group btn-group-sm float-right" role="group" aria-label="Pagination">
	  <button type="button" class="btn btn-light" id="load_post_newer">Próxima</button>
	  <button type="button" class="btn btn-light" id="load_post_older">Anterior</button>
	</div>
</div>