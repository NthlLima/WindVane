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
			    <a class="nav-link" href="/">Home</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link active" href="/blog">Blog</a>
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
	<div class="owl-carousel main-carousel">
	<?php
		$posts = load_featured(0,3);
		$tam   = count($posts);

		if ($tam > 0) {
			foreach ($posts as $post) {
				echo '
				<div class="item-carousel"> 
				<a href="'.$post["link"].'">
					<img src="'.$post["content"].'">
					<div class="jumbotron jumbotron-slider">
						<div class="jumbotron-inner">
							<h1>'.$post["title"].'</h1>
					  		<hr class="my-4">
					  		<p>'.$post["resumo"].'</p>
				  		</div>
					</div> 
				</a>
				</div>';
			}
		}
	?>
	</div>
</header>