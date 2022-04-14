<?php
	require('conexion.php');
	
	session_start();
	
	if(isset($_SESSION["usuario"])){
		header("Location: inicio.php");
	}
	
	if(!empty($_POST))
	{
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$contraseña = mysqli_real_escape_string($mysqli,$_POST['contraseña']);
		$error = '';
	
		$sha1_pass = sha1($contraseña);
	
		$sql = "SELECT idusuario FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$sha1_pass'";
		$result=$mysqli->query($sql);
		$rows =$result->num_rows;
	
		if($rows > 0) {
			$rows =$result->fetch_assoc();
			header("location:inicio.php");
			}else{
				$error = "<i> El Usuario o la Contraseña son incorrectos</i>";
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>

		<!-- Agregar un icono a tu página -->
		<link rel="shortcut icon" type="image/z-icon" href="imagenes/ve.ico">

		<!-- Indica al navegador aceptar los acentos -->
		<meta charset= "UTF-8">

		<!-- Permite que se adapte a todos los tamaños -->
		<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

		<!-- Para agregar un archivo CSS -->
		<link rel="stylesheet" href="css/style.css">

		<!-- CSS -->
		<link rel="stylesheet" href="css/style.min.css">

		<script src="js/style.min.js"></script>
		<script src="js/jquery.min.js"></script>

		<!-- Select2 -->
		<link href="css/select2.min.css" rel="stylesheet" />
		<script src="js/select2.min.js"></script>

		<script type="text/javascript">
			// Solo permite ingresar numeros.
			function soloNumeros(e){
				var key = window.Event ? e.which : e.keyCode
				return (key >= 48 && key <= 57)
			}
		</script>

		<script type="text/javascript">
			$(document).ready(function() {
				$(".js-example-basic-multiple").select2();
			});
		</script>

	</head>

	<body>
		<header id="fix">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-3">
							<img src="imagenes/logo.png" class="logo">
						</div>

						<div class="col-md-6">
							<h1 class="text-center" style="position: relative; top: 15px;">
								U.E José Ignacio Cabrujas 
							</h1>
						</div>

						<div class="col-md-3">
							<img src="imagenes/logo1.png" class="pull-right logo">
						</div>						
					</div>
				</div>
			</div>
		</header>

		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-danger">
						<div class="panel-heading">
							<h3 class="panel-title">Ingreso al Sistema</h3>
						</div>
						<div class="panel-body">
							<form action="login1.php" method="POST">
								<fieldset>

									<div class="form-group">
										<input class="form-control" placeholder="Usuario" name="Usuario"  id="usuario" value="" type="text" autofocus />
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Contraseña" name="Contraseña" id="password" type="password" value=""/>
									</div>
									<div class="checkbox">
										<label>
											<input name="remember" type="checkbox" value="1">Recordarme
										</label>
									</div>

									<input  id="login" class="btn btn-lg btn-danger btn-block" type="submit" value="Iniciar Sesión" />
									<a href="#" name="olvido_contraseña" class="pull-right">¿Olvidó su Contraseña?</a>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>