<?php

    include_once "Usuario.php";
    include_once "SQLUsuario.php";

    //$persona = new Usuario(0, "Luis G. A.", 22, "alarconr@gmail.com"); 
    $persona = new Usuario(123, "Abraham", "Lopez","AbLop",123, "Administrador"); 
    $bdUsuarios = new SQLUsuario();

    $bdUsuarios->agregarUsuario($persona);

?>