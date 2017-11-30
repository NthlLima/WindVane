<header>
	<nav class="navbar navbar-expand-lg navbar-styles bg-transparent">
		<div class="container-fluid container-padding">
		  <a class="navbar-brand" href="#"><img src="assets/img/logo-white.png" width="auto" height="40" alt=""></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <i class="fa fa-bars" aria-hidden="true"></i>
		  </button>
		  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
		    <ul class="navbar-nav">
			  <li class="nav-item">
			    <a class="nav-link active" href="/">Home</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="/blog">Blog</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#Servicos">Serviços</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#Sobre">Sobre</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#Clientes">Clientes</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#Contato">Contato</a>
			  </li>
			</ul>
		  </div>
	  </div>
	</nav>
	<!-- JUMBOTRON -->
	<div class="container">
		<div class="jumbotron jumbotron-styles">
		  <h1>Seu Negócio do Melhor do Marketing Digital</h1>
		  <hr class="my-4">
		  <p>Agência de Marketing Digital</p>

		  <div class="ebook">
		  	<?php
		  		$ebook = load_ebook();

		  		if ($ebook) { ?>
		  		<button>Ganhe nosso Ebook Grátis</button>
			  	<div class="ballon">
			  		<div class="header-ballon">
			  			<i class="fa fa-bell-o icon" aria-hidden="true"></i>
			  			<div class="title"><?php echo $ebook["nome"]; ?></div>
			  		</div>
			  		<div class="body-ballon-outer">
			  			<div class="image-ballon"><img src="<?php echo $ebook["img"]; ?>"></div>
						<input type="hidden" id="ebook-link" value="<?php echo $ebook["link"]; ?>">
				  		<form class="body-ballon" id="form-ebook">
				  			<div class="input-group">
							  <span class="input-group-addon" id="span-ebook-name"><i class="fa fa-user" aria-hidden="true"></i></span>
							  <input type="text" class="form-control" placeholder="Seu Nome Aqui" aria-describedby="span-ebook-name" id="ebook-name">
							</div>
				  			<div class="input-group">
							  <span class="input-group-addon" id="span-ebook-email"><i class="fa fa-envelope" aria-hidden="true"></i></span>
							  <input type="text" class="form-control" placeholder="Seu Email" aria-describedby="span-ebook-email" id="ebook-email">
							</div>
							<button id="resgatar-ebook">Baixar</button>
				  		</form>
			  		</div>
			  	</div> 	
			  </div>
		  	<?php } 

		  	$medias = load_social_media();
		  	?>
		<!-- CARD SOCIAL -->
		<div class="card-group">
		  <div class="card card-social">
		  	<a href="<?php echo $medias[0]["url"]?>" target="_blank">
		    <div class="card-body">
		      <small class="social"><i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;/logustech</small>
		      <h4 class="numbers"><span id="num-face"><?php echo $medias[0]["count"]?></span></h4>
		      <small class="social"><?php echo $medias[0]["type"]?></small>
		    </div>
			</a>
		  </div>

		  <div class="card card-social">
		  	<a href="<?php echo $medias[1]["url"]?>" target="_blank">
		    <div class="card-body">
		    	<small class="social"><i class="fa fa-instagram" aria-hidden="true"></i>&nbsp;&nbsp;@logustech</small>
		      <h4 class="numbers"><span id="num-insta"><?php echo $medias[1]["count"]?></span></h4>
		      <small class="social"><?php echo $medias[1]["type"]?></small>
		    </div>
		    </a>
		  </div>

		  <div class="card card-social">
		  	<a href="<?php echo $medias[2]["url"]?>" target="_blank">
		    <div class="card-body">
		      <small class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i>&nbsp;&nbsp;Logus Tech</small>
		      <h4 class="numbers"><span id="num-yt"><?php echo $medias[2]["count"]?></span></h4>
		      <small class="social"><?php echo $medias[2]["type"]?></small>
		    </div>
		    </a>
		  </div>

		  <div class="card card-social">
		  	<a href="<?php echo $medias[3]["url"]?>" target="_blank">
		    <div class="card-body">
		      <small class="social"><i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;&nbsp;@logustech</small>
		      <h4 class="numbers"><span id="num-twitter"><?php echo $medias[3]["count"]?></span></h4>
		      <small class="social"><?php echo $medias[3]["type"]?></small>
		    </div>
		    </a>
		  </div>
		</div>
		<!--  -->
		</div>
		<!--  -->
	</div>
	<!--  -->
</header>