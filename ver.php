<?php
	session_start();
	if (!isset($_SESSION['username'])) {        
		$message="Login Again";
		header("Location:index.php?msg=$message");
    }
    else {
        $now = time(); // Checking the time now when home page starts.
		if ($now > $_SESSION['expire']) {
            session_destroy();
			$message="Su Sesión Expiró!!!";
			header("Location:index.php?msg=$message");
        }
        else{
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Disponibilidad Equipos</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

		<!-- FAVICON -->
		<link rel='shortcut icon' type='image/x-icon' href='images/favicon.png' />

		<!-- My Styles -->
		<link href="css/estilos.css" rel="stylesheet">
		
		<script src="js/jquery.min.js"></script>
	</head>
	<body>
		<?php include "php/navbar.php"; ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Ver Ordenes</h2>
					<!-- Button trigger modal 
					<a data-toggle="modal" href="#myModal" class="btn btn-default">Agregar</a> -->
					<br><br>
					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Agregar</h4>
								</div>
								<div class="modal-body">
									<form role="form" method="post" action="php/agregar.php">
										<div class="form-group">
											<label for="name">Nombre</label>
											<input type="text" class="form-control" name="name" required>
										</div>
										<div class="form-group">
											<label for="lastname">Apellido</label>
											<input type="text" class="form-control" name="lastname" required>
										</div>
										<div class="form-group">
											<label for="address">Domicilio</label>
											<input type="text" class="form-control" name="address" required>
										</div>
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" class="form-control" name="email" >
										</div>
										<div class="form-group">
											<label for="phone">Telefono</label>
											<input type="text" class="form-control" name="phone" >
										</div>
										<button type="submit" class="btn btn-default">Agregar</button>
									</form>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
					<?php include "php/tabla.php"; ?>
				</div>
			</div>
		</div>
		
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>	
		<script src="js/funciones.js"></script>

	</body>
</html>
<?php
        }
    }
?>