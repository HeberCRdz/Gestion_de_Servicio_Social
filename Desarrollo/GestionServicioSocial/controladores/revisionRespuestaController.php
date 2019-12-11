<?php

require_once(dirname(__DIR__)."/core/BaseController.php");
require_once(dirname(__DIR__)."/core/ViewManager.php");
require_once(dirname(__DIR__)."/modelos/Formato.php");
require_once(dirname(__DIR__)."/modelos/Archivo.php");
require_once(dirname(__DIR__)."/modelos/RevisionSolicitud.php");
require_once(dirname(__DIR__)."/modelos/RevisionRespuesta.php");
require_once(dirname(__DIR__)."/dto/DocumentoPendiente.php");

/**
 * Description of RevisionRespuestaController
 *
 * @author alarconlg
 */
class revisionRespuestaController extends BaseController {
    
    public function index(){
        $datos = [];
        $docPendientesARevisar = RevisionSolicitud::consultarTodos("ESTADO='P'");
        
        foreach($docPendientesARevisar as $doc){
            $docPendiente = new DocumentoPendiente();
            
            $formato = Formato::consultar((Archivo::consultar($doc->getIdArchivo()))->getId());
            
            $docPendiente->setId($doc->getId());
            $docPendiente->setNoControl("D14325145");
            $docPendiente->setEstudiante("Pablo Rodriguez");
            $docPendiente->setDocumento($formato->getTitulo());
            $docPendiente->setFecha($doc->getFechaHora());
            $docPendiente->setNoRevision($doc->getNoRevision());
            
            $datos[] = $docPendiente;
        }
        
        ViewManager::mostrar("ListadoDocPendientes", $datos);
//        $this->redireccionar(URL::construir("camarero","consultar",["id"=>$id]));
    }
    
    public function revisar(){
        $idSolicitud = $_REQUEST["idSolicitud"];
        
    }
}
