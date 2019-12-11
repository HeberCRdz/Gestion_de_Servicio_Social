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
        $doc = RevisionSolicitud::consultar($idSolicitud);
        $formato = Formato::consultar((Archivo::consultar($doc->getIdArchivo()))->getId());
        
        $docPendiente = new DocumentoPendiente();
        
        $docPendiente->setId($doc->getId());
        $docPendiente->setNoControl("D14325145");
        $docPendiente->setEstudiante("Pablo Rodriguez");
        $docPendiente->setDocumento($formato->getTitulo());
        $docPendiente->setFecha($doc->getFechaHora());
        $docPendiente->setNoRevision($doc->getNoRevision());
        $docPendiente->setNotas($doc->getNotas());
        $docPendiente->setIdArchivo($doc->getIdArchivo());
        
        ViewManager::mostrar("RevisionRespuesta", $docPendiente);
    }
    
    public function descargarArchivo(){
        
        $archivo = Archivo::consultar($_GET["idArchivo"]);
        $ruta = dirname(__DIR__)."/archivos/".$archivo->getUbicacionArchivo();
        
        if (is_file($ruta))
        {
           header('Content-Type: application/force-download');
           header('Content-Disposition: attachment; filename='. basename($archivo->getUbicacionArchivo()));
           header('Content-Transfer-Encoding: binary');
           header('Content-Length: '.filesize($ruta));

           readfile($ruta);
        }
        
    }
}
