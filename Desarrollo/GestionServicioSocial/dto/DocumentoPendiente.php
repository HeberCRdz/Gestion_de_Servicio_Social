<?php

/**
 * Description of DocumentoPendiente
 *
 * @author alarconlg
 */
class DocumentoPendiente {
    
    public $Id;
    public $NoControl;
    public $Estudiante;
    public $Documento;
    public $Fecha;
    public $NoRevision;
    
    public function getId() {
        return $this->Id;
    }

    public function getNoControl() {
        return $this->NoControl;
    }

    public function getEstudiante() {
        return $this->Estudiante;
    }

    public function getDocumento() {
        return $this->Documento;
    }

    public function getFecha() {
        return $this->Fecha;
    }

    public function getNoRevision() {
        return $this->NoRevision;
    }

    public function setId($Id): void {
        $this->Id = $Id;
    }

    public function setNoControl($NoControl): void {
        $this->NoControl = $NoControl;
    }

    public function setEstudiante($Estudiante): void {
        $this->Estudiante = $Estudiante;
    }

    public function setDocumento($Documento): void {
        $this->Documento = $Documento;
    }

    public function setFecha($Fecha): void {
        $this->Fecha = $Fecha;
    }

    public function setNoRevision($NoRevision): void {
        $this->NoRevision = $NoRevision;
    }

}
