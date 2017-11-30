<div class="dash-header">
	<h2>E-books</h2>
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	     <li class="breadcrumb-item active" aria-current="page">E-books</li>
	  </ol>
</div>


<div class="dash-main">
	<div class="dash-buttons">
		<button type="button" class="btn btn-jftv btn-sm" data-toggle="modal" data-target="#modalEbooks">Adicionar E-book</button>
	</div>
	<br>
	<div class="table-wrapper">
	<table class="table table-hove table-main">
	  <thead>
	    <tr>
	      <th scope="col">Nome</th>
	      <th scope="col">Status</th>
	      <th scope="col">Downloads</th>
	      <th scope="col">&nbsp;</th>
	      <th scope="col">&nbsp;</th>
	      <th scope="col">&nbsp;</th>
	    </tr>
	  </thead>
	  <tbody id="table-list-ebook">
	  	<?php
	  		$list = list_ebook(0);
	  		foreach ($list as $ebook) {
	  			echo '
	  			<tr>
	  				<td>'.$ebook["nome"].'</td>
	  				<td>'.$ebook["status"].'</td>
	  				<td>'.$ebook["downloads"].'</td>
	  				<td class="tab-link">'.$ebook["img"].'</td>
	  				<td class="tab-link">'.$ebook["link"].'</td>
	  				<td class="tab-link">'.$ebook["config"].'</td>
	  			</tr>';
	  		}

	  	?>
	  </tbody>
	</table>
	</div>
	<div class="btn-group btn-group-sm float-right" role="group" aria-label="Pagination">
	  <button type="button" class="btn btn-light" id="load_ebook_newer">Próxima</button>
	  <button type="button" class="btn btn-light" id="load_ebook_older">Anterior</button>
	</div>
</div>