<?php
    require_once(dirname(__DIR__)."/componentes/Encabezado.php");
?>
<form name="frmRespuesta" method="POST" action="<?php echo URL::construir("revisionRespuestaController", "guardar")?>" onsubmit="return validar()">
    <label>ID:</label><input name="idSolcitud" type="text" value="<?php echo $datos->getId() ?>" readonly="readonly">
    <label>Fecha:</label><input name="fecha" type="datetime" value="<?php echo $datos->getFecha() ?>" readonly="readonly">
    <br>
    <label>No. Control:</label><input name="noControl" type="text" value="<?php echo $datos->getId() ?>" readonly="readonly">
    <label>No. Revisión:</label><input name="noRevision" type="text" value="<?php echo $datos->getNoRevision() ?>" readonly="readonly">
    <br>
    <label>Documento</label><label><?php echo $datos->getDocumento() ?></label>
    <a name="descargarArchivo" class="button" href="<?php echo URL::construir("revisionRespuesta", "descargarArchivo", ["idArchivo" => $datos->getIdArchivo()])?>">Descargar</a>
    <br>
    <label>Notas</label><br>
    <textarea name="notas" rows="8" cols="50" readonly="readonly"><?php echo $datos->getNotas() ?></textarea>
    <br>
    <!-- Datos de Respuesta -->
    
    <label>Comentarios</label><br>
    <textarea name="comentarios" rows="8" cols="50"></textarea>
    <br>
    <input name="archivoRevisado" type="file" value="Seleccionar...">
    <br>
    <input name="correcto" type="checkbox"><label>DOCUMENTO CORRECTO<label>
    <br>
    
    <input type="submit" value="Guardar">
    <a class="button" href="<?php echo URL::construir("revisionRespuesta", "index")?>">Cancelar</a>
</form>
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