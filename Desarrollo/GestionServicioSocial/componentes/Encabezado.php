<!DOCTYPE>
<html lang="es">
    <head>
        <title>Servicio social</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <section class="encabezado">
            <div class="main-menu">
                <div class="imagen-logo">

                </div>
                <div class="opciones">
                    <?php if($_SESSION["TIPOUSUARIO"] == "A"){ 
                        echo "<a href='".URL::construir("usuarios", "index")."'>Gestionar Usuarios</a>";
                    } else if($_SESSION["TIPOUSUARIO"] == "J"){ 
                        echo "<a href='".URL::construir("alumnos", "index")."'>Gestionar Alumnos</a>";
                        echo "<a href='".URL::construir("revisionRespuesta", "index")."'>Documentos Pendientes a Revisar</a>";
                    } else if($_SESSION["TIPOUSUARIO"] == "E"){ 
                        echo "<a href='".URL::construir("revision", "index")."'>Enviar Documento</a>";
                    }              
                    ?>
                </div>
                 <div class="menu-usuario">

                </div>
            </div>
        </section>
        <section class="contenido">
