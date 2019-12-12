<?php
    require_once(dirname(__DIR__)."/componentes/Encabezado.php");
?>
<link rel="stylesheet" type="text/css" href="css/estilo_base.css">
<div class="main-contenedor">
    <div class="form">
        <h2 class="form-title">DOCUMENTOS PENDIENTES A REVISAR</h2>
        <table class="listado">
            <tr>
                <th>Id</th>
                <th>No. Control</th>
                <th>Estudiante</th>
                <th>Documento</th>
                <th>Fecha</th>
                <th>No. Revision</th> 
                <th>Operaciones</th>     
            </tr>
            <?php 
                foreach($datos as $row){
                    echo "<tr>";
                    echo "<td>$row->Id</td>";
                    echo "<td>$row->NoControl</td>";
                    echo "<td>$row->Estudiante</td>";
                    echo "<td>$row->Documento</td>";
                    echo "<td>$row->Fecha</td>";
                    echo "<td>$row->NoRevision</td>";
                    echo "<td><a href='".URL::construir("revisionRespuesta","revisar",["idSolicitud"=>$row->Id])."'>Revisar</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>
<?php
    require_once(dirname(__DIR__)."/componentes/PiePagina.php");
?>