<?php
require ('conexion.php');
session_start();
 
echo "Hola " . $_SESSION['Usuario'];
 
?>