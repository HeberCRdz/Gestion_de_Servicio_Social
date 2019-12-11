<?php

require_once(dirname(__FILE__)."/Conexion.php");

class BaseRecord{    
    protected $_tabla;
    protected $_error;
    
    protected $Id;
 
    function __construct($tabla){
        $this->_tabla = $tabla;
    }

    public function getId() {
        return $this->Id;
    }
    
    public function setId($Id): void {
         $this->Id = $Id;
    }
    
    protected function guardar(){
        $this->_error = "";
        try{
            Conexion::Instancia()->abrir();
            $vars = get_object_vars($this);
            $datos = [];
            foreach ($vars as $var => $valor){
                if(substr($var, 0, 1) == "_") continue;
                $datos[] = array($var => $valor);
            }
            if($this->id > 0)
                $this->id = insertarDatos($datos);
            else
                $this->id = actualizarDatos($this->id, $datos);
        }catch(exception $ex){
            $this->_error = $ex->getMessage(); 
        }finally {
            Conexion::Instancia()->cerrar();
        }
        return $this->id;
    }
    
    protected function eliminar(){
        $this->_error = "";
        try{
            Conexion::Instancia()->abrir();
            $this->id = eliminarDatos("ID", $this->id);     
        }catch(exception $ex){
            $this->_error = $ex->getMessage(); 
        }finally {
            Conexion::Instancia()->cerrar();
        }
        return $this->id;
    }
    
    public static function consultar($id){
        return self::consultarRegistros("ID = " . $id)[0];
    }
    
    public static function consultarPorCampo($campo, $valor){
        return self::consultarRegistros("$campo = '$valor'")[0];
    }
    
    public static function consultarTodos($criterio = ""){
        return self::consultarRegistros($criterio);
    }
    
    protected function insertarDatos($datos){
        $id = 0;
        $campos = "(";
        $valores = "VALUES(";
        foreach($datos as $clave=>$valor){
            $campos .= (strlen($campos) > 1?",":"");
            $campos .= $clave;
            $valores .= (strlen($valores) > 7?",":"");
            $valores .= "'$valor'";
        }
        $campos .= ")";
        $valores .= ")";
        
        if(Conexion::Instancia()->ejecutarComando("INSERT INTO $this->_tabla ".$campos.$valores)){
            $id = Conexion::Instancia()->ejecutarConsulta("SELECT MAX(ID) FROM $this->_tabla ORDER BY ID DESC LIMIT 1")[0][0]; 
        }
        return $id;
    }

    protected function actualizarDatos($id, $datos){
        $campos = "";
        foreach($datos as $clave=>$valor){      
            $campos .= (strlen($campos) > 0?",":"");
            $campos .= "$clave='$valor'";
        }
        //echo "UPDATE $this->_tabla SET $campos WHERE ID=$id";
        return Conexion::Instancia()->ejecutarComando("UPDATE $this->_tabla SET $campos WHERE ID=$id");
    }

    protected function eliminarDatos($campo, $valor){
        return Conexion::Instancia()->ejecutarComando("DELETE FROM $this->_tabla WHERE $campo='$valor'");
    }
    
    protected function existeError(){
        if(strlen($this->_error) > 0) 
            return true;
        return false;
    }
    
    protected function conseguirMensajeError(){
        return $this->_error;
    }
    
    protected static function consultarRegistros($criterio){
        $result = [];
        try{
            Conexion::Instancia()->abrir();

            $dt = Conexion::Instancia()->ejecutarConsulta("SELECT * FROM ". (new static())->_tabla ." WHERE ". $criterio); 
 
            if($dt) {
                foreach($dt as $row){
                    $rowObj = new static();
                    $vars = get_object_vars($rowObj);
                    
                    foreach ($vars as $var => $valor){
                        if(substr($var, 0, 1) == "_") continue;
                        $rowObj->$var = $row[strtoupper($var)];
                    }
                    $result[] = $rowObj;
                }
            }

        }catch(exception $ex){
            $result->_error = $ex->getMessage(); 
        }finally {
            Conexion::Instancia()->cerrar();
        } 
        
        if(count($result) <= 0)
            $result[] = new static();
        
        return $result;
    }
}