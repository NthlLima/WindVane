<div class="dash-header">
	<h2>Configurações</h2>
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item">Home</li>
	     <li class="breadcrumb-item active" aria-current="page">Configurações</li>
	  </ol>
</div> 

<div class="dash-main">
	<h3 class="dash-title">Editar Perfil</h3>
	<br>
	<form class="row" id="formPerfil">
    	<div class="col col-lg-2">
    		<div class="edit-img">
    			<div class="img">
					<img id="user-img" src="<?php echo $_SESSION["wv.perfil"]?>">
				</div>
				<input type="text" name="settingImg" id="settingImg" required="required" hidden="hidden" value="<?php echo $_SESSION["wv.perfil"]?>">
				<input type="file" name="img" id="img" hidden="hidden">
				<label id="uploading" for="img"><i class="fa fa-camera" aria-hidden="true"></i></label>	
			</div>

    	</div>
    	<div class="col">
    		<br>
    		
    		<div class="input-group">
			  <span class="input-group-addon" id="input-Nome"><i class="fa fa-user" aria-hidden="true"></i></span>
			  <input type="text" id="settingNome" class="form-control" placeholder="Nome" aria-label="Nome" aria-describedby="input-Nome" value="<?php echo $_SESSION["wv.nome"]?>">
			</div> 
    		<div class="input-group">
			  <span class="input-group-addon" id="input-Email"><i class="fa fa-at" aria-hidden="true"></i></span>
			  <input type="text" id="settingEmail" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="input-Email" value="<?php echo $_SESSION["wv.email"]?>">
			</div>    
          <button class="btn btn-jftv my-1 my-sm-0" id="submitSetting">Salvar Alterações</button>

    	</div>
  </form>
  <br>
  <br>
  <h3 class="dash-title">Editar Senha</h3>
  	<form class="settings-senha">
  		<input type="password" id="settingOldSenha" class="form-control" placeholder="Senha Antiga">
  		<input type="password" id="settingSenha" class="form-control" placeholder="Senha">
  		<input type="password" id="settingRepSenha" class="form-control" placeholder="Repetir Senha">
  		<button class="btn btn-jftv my-1 my-sm-0" id="submitSenhas">Salvar Alterações</button>
	</form>
</div>

<div class="wrapper-alert">
</div>