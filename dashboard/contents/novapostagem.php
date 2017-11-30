<div class="dash-header">
	<h2>Nova Postagem</h2>
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	     <li class="breadcrumb-item">Postagens</li>
	     <li class="breadcrumb-item active" aria-current="page">Nova Postagem</li>
	  </ol>
</div>

<div class="dash-main no-footer">
	<form id="formPost" method="POST">
		<div class="row">
		    <div class="col">
		      <input type="text" class="form-control" id="inputTitulo" name="inputTitulo" placeholder="Títula da Postagem" required="required">
		      <textarea id="summernote" name="summernote" required="required"></textarea>
		    </div>
		    <div class="col col-lg-2">
		      <div class="sidebar-editor">
		      	<small>Destaque 
		      		<button type="button" class="btn-question" data-toggle="popover" data-placement="bottom" title="Postagem em Destaque" data-content="Postagens em destaque terão visualização em destaques, serão as postagens do topo da página inicial. São postagens de maior importância">
		      			<i class="fa fa-question-circle" aria-hidden="true"></i>
		      		</button>
		      	</small>
		      	<div class="form-check">
			      <label class="form-check-label">
			        <input class="form-check-input" type="checkbox" id="inputDestaque" name="inputDestaque"> Destaque
			      </label>
			    </div>
			    <small>Link 
		      		<button type="button" class="btn-question" data-toggle="popover" data-placement="bottom" title="Link da Postagem" data-content="Crie um link para sua postagem. O link deve ser composto por até 3 palavras. Ex.: 'link-link'">
		      			<i class="fa fa-question-circle" aria-hidden="true"></i>
		      		</button>
		      	</small>
		      	<input type="text" class="form-control" id="inputLink" name="inputLink" required="required">
		      	<small>Categoria</small>
		      	<select id="selectCategoria" name="selectCategoria" class="form-control" required="required">
			        <option selected>Selecione uma Categoria</option>
			        <?php
			        $list = list_category(-1);
              		foreach ($list as $cat) {
              			echo '<option value="'.$cat["id"].'">'.$cat["categoria"].'</option>';
              		}
              		?>
			     </select>
			    <small>Data</small>
		      	<input type="text" class="form-control" id="inputData" name="inputData" required="required">
		      	<small>Palavras-chave
		      		<button type="button" class="btn-question" data-toggle="popover" data-placement="bottom" title="Palavras-chave" data-content="Palavras-chave são um conjunto de palavras que ajudam na classificação da postagem, elas devem ser separadas por vírgula.">
		      			<i class="fa fa-question-circle" aria-hidden="true"></i>
		      		</button>
		      	</small>
		      	<textarea class="form-control" id="textareaKeywords" name="textareaKeywords" rows="4" required="required"></textarea>
		      </div>
		    </div>
		</div>
		<input type="hidden" name="idPostagem" id="idPostagem" value="-1" required="required">
		<input type="hidden" name="nameCategoria" id="nameCategoria" value="" required="required">
		<input type="hidden" name="inputSubmit" id="inputSubmit" value="" required="required">
		<button class="btn btn-info my-1 my-sm-0 btn-formPost" type="submit" data-elem="2">Salvar como Rascunho</button>
		<button class="btn btn-jftv my-1 my-sm-0 btn-formPost" type="submit" data-elem="1">Publicar</button>
	</form>
</div>