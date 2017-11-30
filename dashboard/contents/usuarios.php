<div class="dash-header">
	<h2>Usuários</h2>
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	     <li class="breadcrumb-item active" aria-current="page">Usuários</li>
	  </ol>
</div>


<div class="dash-main">
	<div class="dash-buttons">
		<button type="button" class="btn btn-jftv btn-sm" data-toggle="modal" data-target="#modalUsuarios">Adicionar Usuário</button>
	</div>
	<br>
	<div class="table-wrapper">
	<table class="table table-hove table-main">
	  <thead>
	    <tr>
	      <th scope="col">Nome</th>
	      <th scope="col">Email</th>
	      <th scope="col">Função</th>
	      <th scope="col">Postagens</th>
	      <th scope="col">&nbsp;</th>
	    </tr>
	  </thead>
	  <tbody id="table-list-user">
	  	<?php
	  		$list = list_users(0);
	  		foreach ($list as $user) {
	  			echo '
	  			<tr>
	  				<td>'.$user["nome"].'</td>
	  				<td>'.$user["email"].'</td>
	  				<td>'.$user["funcao"].'</td>
	  				<td>'.$user["posts"].'</td>
	  				<td class="tab-link">'.$user["config"].'</td>
	  			</tr>';
	  		}

	  	?>
	  </tbody>
	</table>
	</div>
	<div class="btn-group btn-group-sm float-right" role="group" aria-label="Pagination">
	  <button type="button" class="btn btn-light" id="load_user_newer">Próxima</button>
	  <button type="button" class="btn btn-light" id="load_user_older">Anterior</button>
	</div>
</div>