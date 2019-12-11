<?php
require_once(dirname(__DIR__)."/core/BaseRecord.php");

/**
 * Description of RevisionSolicitud
 *
 * @author alarconlg
 */
class RevisionRespuesta extends BaseRecord {
    
    public $IdSolicitud;
    public $IdArchivo;
    public $FechaHora;
    public $Comentarios;
    public $Estado;
  
    function __construct(){
        parent::__construct("RevisionRespuestas");
    }
    
    public function getIdSolicitud() {
        return $this->IdSolicitud;
    }

    public function getIdArchivo() {
        return $this->IdArchivo;
    }

    public function getFechaHora() {
        return $this->FechaHora;
    }

    public function getComentarios() {
        return $this->Comentarios;
    }

    public function getEstado() {
        return $this->Estado;
    }

    public function setIdSolicitud($IdSolicitud): void {
        $this->IdSolicitud = $IdSolicitud;
    }

    public function setIdArchivo($IdArchivo): void {
        $this->IdArchivo = $IdArchivo;
    }

    public function setFechaHora($FechaHora): void {
        $this->FechaHora = $FechaHora;
    }

    public function setComentarios($Comentarios): void {
        $this->Comentarios = $Comentarios;
    }

    public function setEstado($Estado): void {
        $this->Estado = $Estado;
    }
}
