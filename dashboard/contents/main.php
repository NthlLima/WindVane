<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<base href="/">
	<title>Dashboard &lsaquo; <?php echo get_site_name();?></title>
	<link rel="icon" href="assets/img/fan.png" type="image/png"/>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>

<div class="sidebar">
	<div class="profile-userpic">
		<img src="<?php echo $_SESSION['wv.perfil'];?>" class="img-responsive" alt="">
	</div>
	<div class="profile-usertitle">
		<div class="profile-usertitle-name">
			<?php echo $_SESSION['wv.nome'];?>
		</div>
		<div class="profile-usertitle-job">
			<?php echo $_SESSION['wv.funcao'];?>
		</div>
	</div>
	<div class="profile-userbuttons">
		<a href="dashboard/configuracoes/"><button type="button" class="btn btn-info btn-sm"><i class="fa fa-cog" aria-hidden="true"></i></button></a>
		<a href="dashboard/postagens/novapostagem/"><button type="button" class="btn btn-jftv btn-sm">Nova Postagem</button></a>
	</div>
	<div class="profile-usermenu">
		<ul class="nav">
			<li class="nav-item <?php if(basename($_SERVER['REQUEST_URI']) == 'dashboard'){ echo 'active';} ?>">
				<a href="dashboard/">
					<i class="fa fa-home" aria-hidden="true"></i>
					Overview 
				</a>
			</li>
			<li class="nav-item <?php if(basename($_SERVER['REQUEST_URI']) == 'postagens'){ echo 'active';} ?>">
				<a href="dashboard/postagens/">
					<i class="fa fa-pencil" aria-hidden="true"></i>
					Postagens
				</a>
			</li>
			<li class="nav-item <?php if(basename($_SERVER['REQUEST_URI']) == 'ebooks'){ echo 'active';} ?>">
				<a href="dashboard/ebooks/">
					<i class="fa fa-book" aria-hidden="true"></i>
					E-books 
				</a>
			</li>
			<li class="nav-item <?php if(basename($_SERVER['REQUEST_URI']) == 'socialmedia'){ echo 'active';} ?>">
				<a href="dashboard/socialmedia/">
					<i class="fa fa-hashtag" aria-hidden="true"></i>
					Social Media 
				</a>
			</li>
			<li class="nav-item <?php if(basename($_SERVER['REQUEST_URI']) == 'comentarios'){ echo 'active';} ?>">
				<a href="dashboard/comentarios/">
					<i class="fa fa-comments" aria-hidden="true"></i>
					Comentários 
				</a>
			</li>
			<?php if($_SESSION['wv.tipo'] == 1 || $_SESSION['wv.tipo'] == 2){ ?>
			<li class="nav-item <?php if(basename($_SERVER['REQUEST_URI']) == 'usuarios'){ echo 'active';} ?>">
				<a href="dashboard/usuarios/">
					<i class="fa fa-user" aria-hidden="true"></i>
					Usuários 
				</a>
			</li>
			<?php } ?>
			<li class="nav-item <?php if(basename($_SERVER['REQUEST_URI']) == 'ajuda'){ echo 'active';} ?>">
				<a href="dashboard/ajuda/">
					<i class="fa fa-question-circle" aria-hidden="true"></i>
					Ajuda 
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="topbar">
<nav class="navbar navbar-expand navbar-light bg-light">
  <button class="btn btn-info" id="btn-slide">
    <span class="navbar-toggler-icon"></span>
  </button>
    <ul class="navbar-nav ml-auto ">
      <li class="nav-item">
        <a class="nav-link" href="dashboard/logout/"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
      </li>
    </ul>
</nav>
</div>

<br>
<br>
<br>
<br>

<div class="container-main ">
<div class="container-fluid">
	<?php 

	if (isset($_GET["editar_postagem"])) {

		$edit_postagem = $_GET["editar_postagem"];
		if ( file_exists( 'contents/editarpostagem.php' ) ) {
			require_once( 'contents/editarpostagem.php' ); 
		}

	} else{

		if ( file_exists( 'contents/'.basename($_SERVER['REQUEST_URI']).'.php' ) ) {
			require_once( 'contents/'.basename($_SERVER['REQUEST_URI']).'.php' ); 
		}
		
	}


	?>
</div>
</div>


<?php 

if ( file_exists( 'modals/'.basename($_SERVER['REQUEST_URI']).'.php') ) {
	require_once( 'modals/'.basename($_SERVER['REQUEST_URI']).'.php' ); 
}?>

<div class="load">
	<img src="/assets/img/fan.svg">
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript">
		$(function () {
  			$("#btn-slide").click(function(){
				$(".topbar").toggleClass("topbar-slide");
				$(".sidebar").toggleClass("sidebar-slide");
				$(".container-main").toggleClass("container-main-slide");
			});
		})

	</script>
<script src="assets/js/functions.js"></script>

<?php 

if (isset($_GET["editar_postagem"])) {
	
	$edit_postagem = $_GET["editar_postagem"];
	if ( file_exists( 'includes/editarpostagem.php' ) ) {
		require_once( 'includes/editarpostagem.php' ); 
	}

} else{
	if ( file_exists( 'includes/'.basename($_SERVER['REQUEST_URI']).'.php') ) {
		require_once( 'includes/'.basename($_SERVER['REQUEST_URI']).'.php' ); 
	}
}

?>
</body>
</html>