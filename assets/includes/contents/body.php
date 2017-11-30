<br>

<section class="container-full" id="Blog">
	<br>
	<div class="container">
		<h2 class="title-sections">As últimas do Blog</h2>
		<small class="subtitle-sections">Aqui você encontra as melhores postagem do mundo do Marketing Digital</small>
	</div>
	<br>
	<br>
	<br>
	<!-- NEWS BLOG -->
	<div class="news-blog">
	<?php
		$posts = load_featured(0,5);
		$tam   = count($posts);
		$html  = '';

		for ($i = 0; $i < $tam; $i++) {

			for ($j = 0; $j < 1; $j++) { 
				$html = $html . '<div class="post-first">
					<article class="card">
			  			<img class="card-img-top" src="'.$posts[$i]["content"].'" alt="'.$posts[$i]["title"].'">
			  			<div class="card-body">
			  				<a href="'.$posts[$i]["link"].'" class="card-body-inner">
					      <h4 class="card-title">'.$posts[$i]["title"].'</h4>
					      <hr>
					      <p class="card-text">'.$posts[$i]["resumo"].'</p>
					  		</a>
					    </div>
		  			</article>
		  		</div>';

				$i++;
				  
				if($i >= $tam) break;
			}

			if($i >= $tam) break;
			$html = $html . '<div class="post-groups">';

			for ($j = 0; $j < 2; $j++) { 

				$html = $html . '<div class="card-group">';

				for ($g = 0; $g < 2; $g++) { 

					$html = $html . '<article class="card">
					    <img class="card-img-top" src="'.$posts[$i]["content"].'" alt="'.$posts[$i]["title"].'">
					    <div class="card-body">
					    	<a href="'.$posts[$i]["link"].'" class="card-body-inner">
					      		<h4 class="card-title">'.$posts[$i]["title"].'</h4>
					      		<hr>
					      		<p class="card-text">'.$posts[$i]["resumo"].'</p>
					      	</a>
					    </div>
					  </article>';

					  $i++;
					  if($i >= $tam) break;

				}

				$html = $html . '</div>';

				if($i >= $tam) break;
			}

			$html = $html . '</div>';
			if($i >= $tam) break;

		}

		echo $html;
		
	?>
	</div>
</section>
<br>
<br>

<section class="container-full" id="Servicos">
	<br>
	<div class="container">
		<h2 class="title-sections">Nossos Serviços</h2>
		<small class="subtitle-sections">Os melhores serviços especialmente para <b>você</b></small>
	</div>
	<br>
	<br>
	<br>
	<!-- SERVICES -->
	<div class="container services-decks">
		<div class="card-deck">
			  <div class="card">
			    <img class="card-img-top" src="assets/img/line-chart.png" alt="Card image cap">
			    <div class="card-body">
			    	<div>
			      		<h4 class="card-title">Consultoria e Análise</h4>
			      		<p class="card-text">O melhor caminho para o seu negócio crescer é fazer uma análise sobre a melhor forma para o seu negócio ser visto na internet.</p>
			      	</div>
			    </div>
			  </div>
			  <div class="card">
			    <img class="card-img-top" src="assets/img/designer.png" alt="Card image cap">
			    <div class="card-body">
			    	<div>
			      		<h4 class="card-title">Design Gráfico</h4>
			      		<p class="card-text">É fundamental a criação ou redesign da sua marca, para que fique de acordo com as principais tendências do mundo virtual, lembre-se a internet vive de imagem.</p>
			      	</div>
			    </div>
			  </div>
		</div>
		<div class="card-deck">
			  <div class="card">
			    <img class="card-img-top" src="assets/img/social-media.png" alt="Card image cap">
			    <div class="card-body">
			    	<div>
			      		<h4 class="card-title">Gestão de Redes Sociais</h4>
			      		<p class="card-text">É indispensável o seu empreendimento ter um ótimo visual, porém não estar nas redes sociais para se comunicar pode ser um grande erro. Cada vez mais o número de pessoas nas redes sociais aumentam.</p>
			      	</div>
			    </div>
			  </div>
			  <div class="card">
			    <img class="card-img-top" src="assets/img/website.png" alt="Card image cap">
			    <div class="card-body">
			    	<div>
			      		<h4 class="card-title">Criação Website</h4>
			      		<p class="card-text">Além das redes sociais, é necessário a sua empresa ter um espaço exclusivo na internet e esse espaço é o seu site, o lugar mais completo para as informações do seu negócio.</p>
			      	</div>
			    </div>
			  </div>
		</div>
		<div class="card-deck">
			  <div class="card">
			    <img class="card-img-top" src="assets/img/seo.png" alt="Card image cap">
			    <div class="card-body">
			    	<div>
			      		<h4 class="card-title">Tráfego Online (SEO)</h4>
			      		<p class="card-text">O seu site pode até ser incrível, mas de nada adianta se você não está bem posicionado no Google (o lugar mais utilizado para buscas na internet).</p>
			      	</div>
			    </div>
			  </div>
			  <div class="card card-hidden">
			  </div>
		</div>
	</div>
</section>
<br>
<br>
<br>

<section class="container-full grid-logus" id="Sobre">
	<br>
	<br>
	<br>
	<div class="container">
		<h2 class="title-sections color-light">Sobre</h2>
		<small class="subtitle-sections color-light">Vem conhecer mais um pouco sobre nós</small>
	</div>
	<br>
	<br>
	<br>
	<div class="container-fluid container-padding-30">
		<div class="about-us">A agência <b>Logus Tech</b> é especialista em marketing digital e tecnologia. Atuando no mercado, utilizando os recursos mais avançados do mundo digital. <br>Desenvolvendo as melhores soluções para empresas que buscam entrar no mundo online, aumentar o alcance da sua marca, atingir de forma assertiva seu público alvo ou até mesmo criar seu próprio sistema de monitoramento, análises e pesquisa através de uma plataforma web ou mobile.</div>
		<br>
		<br>
		<center>
			<img src="assets/img/logo-white.png">	
		</center>
		<br>
	</div>
<br>
<br>
<br>
<br>
<br>
</section>
<br>
<br>
<section class="container-full">
	<br>
	<div class="container">
		<h2 class="title-sections">Clientes</h2>
		<small class="subtitle-sections">Conheça alguns dos nossos clientes</small>
	</div>
	<br>
	<br>
	<br>
	<div class="container">
		<div class="owl-carousel clients-carousel">
		  <div class="item-carousel"> <img src="assets/img/cliente_1.png"> </div>
		  <div class="item-carousel"> <img src="assets/img/cliente_2.png"> </div>
		  <div class="item-carousel"> <img src="assets/img/cliente_3.png"> </div>
		  <div class="item-carousel"> <img src="assets/img/cliente_4.png"> </div>
		  <div class="item-carousel"> <img src="assets/img/cliente_5.png"> </div>
		  <div class="item-carousel"> <img src="assets/img/cliente_6.png"> </div>
		</div>
	</div>
</section>
<br>
<br>
<br>
<br>