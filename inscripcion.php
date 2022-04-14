<?php
include ("conexion.php")

if(isset($_POST['enviar']))
{
    if($_POST['Nombre'] == '' or $_POST['Apellido'] == '' or $_POST['Cedula'] == '' or $_POST['Edad'] == '' or $_POST['Sexo'] == '' or
	$_POST['Grado'] == '' or $_POST['representante'] == '' or $_POST['Telefono'] == '')
    {
        echo 'Por favor llene todos los campos.';
    }
    else
    {   
        $sql = 'SELECT * FROM Alumno';
        $rec = mysql_query($sql);
        $verificar_alumno = 0;
 
        while($result = mysql_fetch_object($rec))
        {
            if($result->Cedula == $_POST['Cedula'])
            {
                $verificar_alumno = 1;
            }
        }
 
        if($verificar_alumno)
        {
           
           $Nombre = $_POST['Nombre'];
           $Apellido = $_POST['Apellido'];
		   $Cedula = $_POST['Cedula'];
           $Edad = $_POST['Edad'];
		   $Sexo = $_POST['Sexo'];
           $Grado = $_POST['Grado'];
		   //$representante = $_POST['representante']; creo que no me corre por eso como se supone que me almacene esto si en la tabla de alumno no hay un representante
           $Telefono = $_POST['Telefono'];
		  
           $query = "INSERT INTO alumnos (Nombre,Apellido,Cedula,Edad,Sexo,Grado,representante,Telefono) VALUES ('$Nombre','$Apellido','$edad','$Sexo','$Grado,'$representante','$Telefono')";

			$result = mysql_query($cnx, $query) or die('ERROR AL INSERTAR DATOS: ' . mysql_last_error());
			$cmdtuples = mysql_affected_rows($result);
				echo 'Alumno registrado correctamente.';   
        }
        else
        {
            echo 'Este alumno ya ha sido registrado anteriormente.';   
        }
    }
}
<?