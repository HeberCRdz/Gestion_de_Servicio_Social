<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Insertar nuevo contacto</title>
        <link rel="stylesheet" type="text/css" href="estiloMenu.css" media="screen">
    </head>
    <body>
        <div id="titulo">
            <div class="right">
                <img src="jgtyv.jpg" alt="">
            </div>
            
            <div class="left">
                <img src="agregar.jpg" width="100px", height="100px">
                <h3>Agregar Alumno</h3>
            </div>
        </div>
        
        <br><br><br><br><br><br><br><br>
        
        
        <div id="agregar">
        <form method="GET" action="agregar.php">
        Id: <input type="text" size="20" placeholder=" ID" required name="id">
            <br><br>
        NoControl: <input type="text" size="20" placeholder=" No Control" required name="nocontrol">
            <br><br>
        Carrera: <input type="text" size="20" placeholder=" Carrera" required name="carrera">
            <br><br>
        Semestre: <input type="text" size="20" placeholder=" Semestre" required name="semestre">
            <br><br>
        IdUsuario: <input type="text" size="20" placeholder=" ID Usuario" required name="idusuario">
            <br><br>
        <input type="submit" value="Guardar">
        <input type="reset" size="25" value="Limpiar">
        </form>
        </div>
        <div id="footer">
            <a href="index.html">Regresar a Pagina Anterior</a>
		</div>
    </body>
</html>