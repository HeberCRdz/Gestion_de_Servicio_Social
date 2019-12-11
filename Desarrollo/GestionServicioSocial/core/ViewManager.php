<?php

class ViewManager{
    /*
    * $codigo: A = aviso, C = correcto, E = error
    */
    static function mostrar($nombreVista, $datos, $codigo = "", $mensaje = "", $datosVista = null){
        
        if(isset($_SESSION["RESULTADO"])){
            $codigo = $_SESSION["RESULTADO"]["CODIGO"];
            $mensaje = $_SESSION["RESULTADO"]["MENSAJE"];
        }
        
        require_once(dirname(__DIR__)."/core/URL.php");
        require_once(dirname(__DIR__)."/vistas/". $nombreVista."View.php");
        require_once(dirname(__DIR__)."/componentes/Mensaje.php");
        
        unset($_SESSION["RESULTADO"]);
    }
}