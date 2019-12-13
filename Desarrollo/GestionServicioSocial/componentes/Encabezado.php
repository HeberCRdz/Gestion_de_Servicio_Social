<!DOCTYPE>
<html lang="es">
    <head>
        <title>Servicio social</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <header>
            <div class="main-menu">
                <div class="imagen-logo">
                    <img src="imagenes/logogtyv.png">
                </div>
                <?php if(isset($_SESSION["IDUSUARIO"])) { ?>
                <div class="opciones">
                    <?php if($_SESSION["TIPOUSUARIO"] == "A"){ 
                        echo "<a id='GestionarUsuarios' ".($opcion == "GestionarUsuarios" ? "class='opcion-select'" : "")." href='".URL::construir("usuarios", "index")."'>Gestionar Usuarios</a>";
                    } else if($_SESSION["TIPOUSUARIO"] == "J"){ 
                        echo "<a id='GestionarAlumnos' ".($opcion == "GestionarAlumnos" ? "class='opcion-select'" : "")." href='".URL::construir("alumnos", "index")."'>Gestionar Alumnos</a>";
                        echo "<a id='DocPendientes' ".($opcion == "DocPendientes" ? "class='opcion-select'" : "")." href='".URL::construir("revisionRespuesta", "index")."'>Documentos Pendientes a Revisar</a>";
                    } else if($_SESSION["TIPOUSUARIO"] == "E"){ 
                        echo "<a id='EnviarDoc' ".($opcion == "EnviarDoc" ? "class='opcion-select'" : "")." href='".URL::construir("revision", "index")."'>Enviar Documento</a>";
                    }              
                    ?>
                </div>
                <div class="menu-usuario">
                    <a class="button-link" href="<?php echo URL::construir("index","cerrarSesion")?>">Cerrar sesión</a>
                </div>
                <?php } ?>
            </div>
        </header>
        <section class="contenido">
