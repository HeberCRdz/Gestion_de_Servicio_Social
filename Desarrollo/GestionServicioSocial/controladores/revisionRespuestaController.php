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
    }
    
    public function guardar(){
        $solicitud = RevisionSolicitud::consultar($_REQUEST["idSolicitud"]);
        $solicitudArchivo = Archivo::consultar($solicitud->getIdArchivo());
 
        //Guardar archivo y copiar a directorio
        
        $archivo = new Archivo();
        if(isset($_FILES["archivoRevisado"])){
            $archivo->setIdFormato($solicitudArchivo->getIdFormato());
            $archivo->setTitulo("Revisado".date("Ymdhi")."_".$_FILES["archivoRevisado"]["name"]);
            $archivo->setUbicacionArchivo("revisionRespuestas/".$archivo->getTitulo());

            move_uploaded_file($_FILES["archivoRevisado"]["tmp_name"], dirname(__DIR__)."/archivos/".$archivo->getUbicacionArchivo());
            $archivo->guardar();
        }
        
        //Actualizar solicitud de revisión
        $estado = "E";
        if(isset($_REQUEST["correcto"]))
            $estado = "C";
        
        $solicitud->actualizarEstado($estado);
        
        //Guardar Revisión
        $revision = new RevisionRespuesta();
        $revision->setIdSolicitud($solicitud->getId());
        $revision->setIdArchivo($archivo->getId());
        $revision->setFechaHora(date("Y-m-d h:i:s"));
        $revision->setComentarios($_REQUEST["comentarios"]);
        $revision->setEstado($estado);
        
        $revision->guardar();
        
        $this->redireccionar(URL::construir("revisionRespuesta","index"), "C", "Datos Guardados Correctamente");
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
