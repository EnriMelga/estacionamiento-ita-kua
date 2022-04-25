<?php
    //TESTEANDO login
        //testeo ...
    require "InicioSesion.php";
    require "validacion.php";

    $username =validar($_POST["username"]);
    $pass = validar( $_POST["pass"]);

    if(isset($pass) && isset($pass)){
        $login = new InicioSesion();
        $login->iniciarSesion($username, $pass); 
    }else{
        echo "Complete los datos";
    }
    
?>