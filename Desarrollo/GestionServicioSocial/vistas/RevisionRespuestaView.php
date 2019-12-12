<?php
    require_once(dirname(__DIR__)."/componentes/Encabezado.php");
?>
<link rel="stylesheet" type="text/css" href="css/estilo_base.css">
<div class="main-contenedor">
    <form name="frmRespuesta" class="form" method="POST" action="<?php echo URL::construir("revisionRespuesta", "guardar")?>" enctype="multipart/form-data" onsubmit="return validar()">
        <div class="form-group group-center">
            <h2 class="form-title">REVISIÓN DE DOCUMENTO</h2>
        </div>
        <div class="form-group group-center">
            <div class="form-col">
                <label>ID:</label>
            </div>
            <div class="form-col">
                <input name="idSolicitud" type="text" value="<?php echo $datos->getId() ?>" readonly="readonly">
            </div>
        </div>
        <div class="form-group group-center">
            <div class="form-col">
                <label>Fecha:</label>
            </div>
            <div class="form-col">
                <input name="fecha" type="datetime" value="<?php echo $datos->getFecha() ?>" readonly="readonly">
            </div>
        </div>   
        <div class="form-group group-center">
            <div class="form-col">
                <label>No. Control:</label>
            </div>
            <div class="form-col">
                <input name="noControl" type="text" value="<?php echo $datos->getId() ?>" readonly="readonly">
            </div>
        </div> 
        <div class="form-group group-center">
            <div class="form-col">
                <label>No. Revisión:</label>
            </div>
            <div class="form-col">
                <input name="noRevision" type="text" value="<?php echo $datos->getNoRevision() ?>" readonly="readonly">
            </div>
        </div> 
        <div class="form-group group-center">
            <div class="form-col">
                <label>Documento:</label>
            </div>
            <div class="form-col">
                <label><?php echo $datos->getDocumento() ?></label>
            </div>
            <div class="form-col">
                <a name="descargarArchivo" class="button" href="<?php echo URL::construir("revisionRespuesta", "descargarArchivo", ["idArchivo" => $datos->getIdArchivo()])?>">Descargar</a>
            </div>
        </div> 
        <div class="form-group group-left">
            <div class="form-col">
                <label>Notas:</label>
            </div>
        </div> 
        <div class="form-group group-center">
            <div class="form-col">
                <textarea name="notas" rows="8" cols="50" readonly="readonly"><?php echo $datos->getNotas() ?></textarea>
            </div>
        </div> 

        <!-- Datos de Respuesta -->
        <div class="form-group group-left">
            <div class="form-col">
                <label>Comentarios:</label>
            </div>
        </div> 
        <div class="form-group group-center">
            <div class="form-col">
                <textarea name="comentarios" rows="8" cols="50"></textarea>
            </div>
        </div> 
        <div class="form-group group-center">
            <div class="form-col">
                <label>Documento revisado:</label>
            </div>
            <div class="form-col">
                <input name="archivoRevisado" type="file" value="Seleccionar...">
            </div>
        </div> 
        <div class="form-group group-center">
            <div class="form-col">
                <input name="correcto" type="checkbox"><label>DOCUMENTO CORRECTO<label>
            </div>
        </div> 
        <div class="form-group group-right">
            <div class="form-col group-right">
                <input class="button" type="submit" value="Guardar">
                <a class="button" href="<?php echo URL::construir("revisionRespuesta", "index")?>">Cancelar</a>
            </div>
        </div> 
    </form>
</div>
<script>
    function validar(){
        if(document.frmRespuesta.archivoRevisado.value == ""){
            alert("Es necesario subir el archivo");
            return false;
        }
        return true;
    }
</script>
<?php
    require_once(dirname(__DIR__)."/componentes/PiePagina.php");
?>