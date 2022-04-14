<?php
    
    //conectar BD
    include("conexion.php");  
     
    $usr = $_POST['Usuario'];
    $pw = $_POST['Contraseña'];
    //Obtengo la version encriptada del password
    $pw_enc = md5($pw);
     
    $sql = "SELECT Usuario, Contraseña FROM usuarios
            WHERE Usuario = '".$usr."' AND Contraseña = '".$pw."' ";  
    
    $result     =mysql_query($sql); 
 
     
    //Si existe al menos una fila
    if($fila=mysql_fetch_array($result))
    {       
        //Obtener el Id del usuario en la BD        
        $usr = $fila['Usuario'];
        //Iniciar una sesion de PHP
        session_start();
        //Crear una variable para indicar que se ha autenticado
        $_SESSION['autenticado']= 'SI';
       
        //CODIGO DE SESION
         
        //Crear un formulario para redireccionar al usuario y enviar oculto su Id 
?>
        <form name="formulario" method="post" action="usuario.html">
            <input type="hidden" name="Usuario" value='<?php echo $usr ?>' />
        </form>
<?php
    }
    else {
        //En caso de que no exista una fila...
        //..Crear un formulario para redireccionar al usuario a la pagina de login 
        //enviandole un codigo de error
?>
        <form name="formulario" method="post" action="login.html">
            <input type="hidden" name="msg_error" value="1">
        </form>
<?php
    }
?>
                     
<script type="text/javascript"> 
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>