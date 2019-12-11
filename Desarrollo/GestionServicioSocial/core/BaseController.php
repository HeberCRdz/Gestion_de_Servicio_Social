<?php
require_once(dirname(dirname(__FILE__))."/core/URL.php");

abstract class BaseController{

    protected function redireccionar($url, $codigo = "", $mensaje = ""){
        unset($_SESSION["RESULTADO"]);
        if($codigo != ""){
            $_SESSION["RESULTADO"] = ["CODIGO"=>$codigo, "MENSAJE"=>$mensaje]; 
        }
        header("Location: $url");
    }

}