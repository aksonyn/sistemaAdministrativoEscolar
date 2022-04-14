<?php

	$mysqli=new mysqli("localhost","root","administrador","colegiodb");//servidor,usuario de base de datos, contraseña del usuario, nombre de base de datos
	if(mysqli_connect_errno()){
		echo'conexion fallida:',mysqli_connect_error();
	exit();
	}
	
?>