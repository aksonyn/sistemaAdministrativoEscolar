<?php
	require('conexion.php');
	
	session_start();
	
	if(isset($_SESSION["usuario"])){
		header("Location: inicio.php");
	}
	
	if(!empty($_POST))
	{
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$contrase�a = mysqli_real_escape_string($mysqli,$_POST['contrase�a']);
		$error = '';
	
		$sha1_pass = sha1($contrase�a);
	
		$sql = "SELECT idusuario FROM usuarios WHERE usuario = '$usuario' AND contrase�a = '$sha1_pass'";
		$result=$mysqli->query($sql);
		$rows =$result->num_rows;
	
		if($rows > 0) {
			$rows =$result->fetch_assoc();
			header("location:inicio.php");
			}else{
				$error = "<i> El Usuario o la Contrase�a son incorrectos</i>";
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>

		<!-- Agregar un icono a tu p�gina -->
		<link rel="shortcut icon" type="image/z-icon" href="imagenes/ve.ico">

		<!-- Indica al navegador aceptar los acentos -->
		<meta charset= "UTF-8">

		<!-- Permite que se adapte a todos los tama�os -->
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
								U.E Jos� Ignacio Cabrujas 
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
										<input class="form-control" placeholder="Contrase�a" name="Contrase�a" id="password" type="password" value=""/>
									</div>
									<div class="checkbox">
										<label>
											<input name="remember" type="checkbox" value="1">Recordarme
										</label>
									</div>

									<input  id="login" class="btn btn-lg btn-danger btn-block" type="submit" value="Iniciar Sesi�n" />
									<a href="#" name="olvido_contrase�a" class="pull-right">�Olvid� su Contrase�a?</a>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>