<?php
require_once(dirname(__DIR__)."/core/BaseRecord.php");

/**
 * Description of Formato
 *
 * @author alarconlg
 */
class Formato extends BaseRecord{
    public $Titulo;
    public $Descripcion;
    public $UbicacionArchivo;
    
    function __construct(){
        parent::__construct("Formatos");
    }
    
    public function getTitulo() {
        return $this->Titulo;
    }

    public function getDescripcion() {
        return $this->Descripcion;
    }

    public function getUbicacionArchivo() {
        return $this->UbicacionArchivo;
    }

    public function setTitulo($Titulo): void {
        $this->Titulo = $Titulo;
    }

    public function setDescripcion($Descripcion): void {
        $this->Descripcion = $Descripcion;
    }

    public function setUbicacionArchivo($UbicacionArchivo): void {
        $this->UbicacionArchivo = $UbicacionArchivo;
    }

}
