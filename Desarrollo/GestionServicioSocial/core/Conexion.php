<?php
/*
 * 
 * 
 * 
 */
require_once(dirname(dirname(__FILE__))."/config/Config.php");

class Conexion{

    private static $_instancia;
    private $_conexion;

    public static function Instancia(){
        if(self::$_instancia == null)
            self::$_instancia = new Conexion();
        return self::$_instancia;
    }

    public function abrir(){
        $this->_conexion = mysqli_connect(SERVERDB, USERDB, PASSWORDDB, NAMEDB);
    }

    public function cerrar(){
        mysqli_close($this->_conexion);
    }

    public function ejecutarConsulta($consulta){
        $resultado = mysqli_query($this->_conexion, $consulta);
        $datos = [];
        while($registro = $resultado->fetch_array()){
            $datos[] = $registro;
        }
        return $datos;
    }

    public function ejecutarComando($comando){
        return mysqli_query($this->_conexion, $comando);
    }
}