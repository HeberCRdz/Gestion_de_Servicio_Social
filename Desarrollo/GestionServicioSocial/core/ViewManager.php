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
        require_once(dirname(dirname(__FILE__))."/vistas/". $nombreVista."View.php");

        unset($_SESSION["RESULTADO"]);
    }
}