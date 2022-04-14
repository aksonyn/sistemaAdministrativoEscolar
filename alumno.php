<?php
include ("conexion.php")

//tomar los datos que estan en la variable $_POST
// aqui creas las variables siempre con el dolar. Ejemplo $sexo=$_POST['Sexo']; lo que esta entre los corchetes es la palabra como lo defines en la base de datos si en la tabla de la bd dice fecha aqui colocas fecha, si dice FeChAaaaA asi lo colocas aqui, es importante que verifiques que lo mismo que escribes entre los corchetes sea exacto a la bd y exacto a lo que colocas en el html en la parte donde defines los input <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" maxlength="10" required /> en donde dice name="Esto debe ser Exacto a la Base de datos y a lo que esta dentro de los corchetes" en la declaracion de variables, las tres cosas deben ser exactamente iguales. 

$id=$_POST['idAlumno'];
$Nombre=$_POST['Nombre'];
$Apellido=$_POST['Apellido'];
$Sexo=$_POST['Sexo'];
$Cedula=$_POST['Cedula'];
$Edad=$_POST['Edad'];


//consulta sencilla
// con este query ya se pueden ingresar datos en la base de datos pero deben hacer que lo que esta en la base de datos y el html coincidan ni son iguales no va a funcionar, en donde esta en input name=. deben hacer que coincidan esos names con los nombres que estan aqui idInscripcion, idRepresentante, idAlumno, FechaInscripcion, TipoInscripcion y todos los nombres que agreguen. $query = "INSERT INTO Inscripcion "este es el nombre de la tabla" (aqui van los datos como los colocan en la base de datos, idInscripcion, idRepresentante, idAlumno, FechaInscripcion, TipoInscripcion) VALUES (aqui van las variables con el $ como las declaran en la parte de arriba, $id, '$representante', '$alumno', '$fecha', '$tipo');";

$query = "INSERT INTO Alumno (idAlumno, Nombre, Apellido, Sexo, Cedula, Edad) VALUES ($idAlumno, '$Nombre', '$Apellido', '$Sexo', '$Cedula', '$Edad');";

$result = mysql_query($cnx, $query) or die('ERROR AL INSERTAR DATOS: ' . mysql_last_error());

$cmdtuples = mysql_affected_rows($result);
echo $cmdtuples . " datos registrados.\n";
// Free resultset liberar los datos
mysql_free_result($result);

?>
