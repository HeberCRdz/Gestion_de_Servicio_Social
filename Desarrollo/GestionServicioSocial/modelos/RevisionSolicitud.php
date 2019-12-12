<?php
require_once(dirname(__DIR__)."/core/BaseRecord.php");

/**
 * Description of RevisionSolicitud
 *
 * @author alarconlg
 */
class RevisionSolicitud extends BaseRecord  {
    
    public $IdAlumno;
    public $IdArchivo;
    public $FechaHora;
    public $NoRevision;
    public $Notas;
    public $Estado;
    
    function __construct(){
        parent::__construct("RevisionSolicitudes");
    }
    
    public function actualizarEstado($estado){
        $this->_error = "";
        try{
            Conexion::Instancia()->abrir();
            $this->Id = $this->actualizarDatos($this->Id, ["ESTADO" => "$estado"]);
        }catch(exception $ex){
            $this->_error = $ex->getMessage(); 
        }finally {
            Conexion::Instancia()->cerrar();
        }
        return $this->Id;
    }
    
    public function getIdAlumno() {
        return $this->IdAlumno;
    }

    public function getIdArchivo() {
        return $this->IdArchivo;
    }

    public function getFechaHora() {
        return $this->FechaHora;
    }

    public function getNoRevision() {
        return $this->NoRevision;
    }

    public function getNotas() {
        return $this->Notas;
    }

    public function getEstado() {
        return $this->Estado;
    }

    public function setIdAlumno($IdAlumno): void {
        $this->IdAlumno = $IdAlumno;
    }

    public function setIdArchivo($IdArchivo): void {
        $this->IdArchivo = $IdArchivo;
    }

    public function setFechaHora($FechaHora): void {
        $this->FechaHora = $FechaHora;
    }

    public function setNoRevision($NoRevision): void {
        $this->NoRevision = $NoRevision;
    }

    public function setNotas($Notas): void {
        $this->Notas = $Notas;
    }

    public function setEstado($Estado): void {
        $this->Estado = $Estado;
    }
    
}
