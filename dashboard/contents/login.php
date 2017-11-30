<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<base href="/">
	<title>Login &lsaquo; <?php echo get_site_name();?></title>
	<link rel="icon" href="assets/img/fan.png" type="image/png"/>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/dashboard.css">
	<style type="text/css">
		body{
			background: #07101d;
		}
	</style>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="assets/js/functions.js"></script>
	<script src="assets/js/login.js"></script>
</head>
<body>
	<div class="login">
		<div class="header-login">
			<img src="assets/img/fan_bounce_in.svg">
		</div>
		<div class="body-login">
			<form id="loginForm">
				<div class="input-group">
				  <input type="email" class="form-control" id="loginEmail" placeholder="Email" aria-describedby="login-email" required="required">
				  <span class="input-group-addon" id="login-email"><i class="fa fa-at" aria-hidden="true"></i></span>
				</div>
				<div class="input-group">
				  <input type="password" class="form-control" id="loginPassword" placeholder="Senha" aria-describedby="login-password" required="required">
				  <span class="input-group-addon" id="login-password"><i class="fa fa-lock" aria-hidden="true"></i></span>
				</div>
				<button id="btnLogin" class="btn btn-info">Entrar</button>
			</form>
		</div>
		<small class="legenda-login">WindVane Platform<br> Powered By LogusTech</small>
	</div>
<div class="wrapper-alert">
</div>
<div class="load">
	<img src="/assets/img/fan.svg">
</div>
</body>
</html>