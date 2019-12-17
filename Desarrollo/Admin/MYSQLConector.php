<?php
    class MYSQLConector {

        private $servidor;
        private $usuario;
        private $contrasenia;
        private $bd;

        private $conexion;

        function __construct(){
            $this->servidor = "localhost";
            $this->usuario = "root";
            $this->contrasenia = "";
            $this->bd = "serviciosocial";
        }

        function Open(){
            $this->conexion = mysqli_connect($this->servidor, $this->usuario, $this->contrasenia, $this->bd);
        }

        function Query($sqlquery){
            $respuesta = mysqli_query($this->conexion, $sqlquery);
            if(!$respuesta){
                echo "SQL ERROR";
                mysql_error();
                exit;
            }
            return $respuesta;
        }

        function Close(){
            mysqli_close($this->conexion);
            $this->conexion = null;
        }
    }
?>