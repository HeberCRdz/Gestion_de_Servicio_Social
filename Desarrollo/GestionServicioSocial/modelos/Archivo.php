<?php
require_once(dirname(__DIR__)."/core/BaseRecord.php");


/**
 * Description of Archivo
 *
 * @author alarconlg
 */
class Archivo extends BaseRecord{
    
    public $Titulo;
    public $IdFormato;
    
    function __construct(){
        parent::__construct("Archivos");
    }
    
    public function getTitulo() {
        return $this->Titulo;
    }

    public function getIdFormato() {
        return $this->IdFormato;
    }

    public function setTitulo($Titulo): void {
        $this->Titulo = $Titulo;
    }

    public function setIdFormato($IdFormato): void {
        $this->IdFormato = $IdFormato;
    }

}
