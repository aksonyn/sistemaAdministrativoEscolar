<?php
require ('conexion.php');
$usuario = $_POST['Usuario'];
$pass = $_POST['Contraseña'];
 
if(empty($usuario) || empty($pass)){
header("Location:login.html");
exit();
}
 
$result = mysqli_query('SELECT Usuario, Contraseña from usuarios where Usuario=.\''.$usuario.'.\'');
 
if($row = mysqli_fetch_array($result)){
if($row['Contraseña'] == $pass){
session_start();
$_SESSION['Usuario'] = $usuario;
}else{
header("Location: login.html");
exit();
}
}else{
header("Location: usuario.html");
exit();
}
 
?>