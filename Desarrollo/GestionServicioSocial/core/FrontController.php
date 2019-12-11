<?php
require_once(dirname(dirname(__FILE__))."/componentes/Portada.php");

class FrontController
{
    static function main(){

        $nombreControlador = "paginaController";
        $accion = "index";

        if(isset($_GET["controlador"]))
            $nombreControlador = $_GET["controlador"] . "Controller";

        if(isset($_GET["accion"]))
            $accion = $_GET["accion"];

        if(!isset($_SESSION["IDUSUARIO"]) ){
            $nombreControlador = "loginController";
        }
        
        require_once(dirname(dirname(__FILE__))."/controladores/$nombreControlador.php");

        $controlador = new $nombreControlador();
        $controlador->$accion();
    }
}
