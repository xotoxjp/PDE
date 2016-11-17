<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: inicio.php");
}
$message = $_GET['msg']; 

require 'php\database.php';

?>
<html lang="es"> 
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Iniciar Sesión</title>
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- FAVICON -->
	<link rel='shortcut icon' type='image/x-icon' href='images/favicon.png' />
	<!-- My Styles -->
	<link href="css/estilos.css" rel="stylesheet">
</head>
 
<body class="login">
    <div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<a href="#" class="active" id="login-form-link">Ingresar</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="php/checklogin.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Usuario" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
									</div>
									<div class="form-group">
										<?php if(!empty($message)): ?>
											<div class="alert alert-danger" role="alert"><?= $message ?></div>
										<?php endif; ?>
									</div>
<!-- 									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Recordarme</label>
									</div> -->
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
<!-- 												<div class="text-center">
													<a href="http://phpoll.com/recoverALGO" tabindex="5" class="forgot-password">Olvido su clave?</a>
												</div> -->
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Scripts -->	
	<script src="js/jquery.min.js"></script>
	<script src="js/funciones.js"></script>
</body>
</html>