<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Eliminar Alumno</title>
        <link rel="stylesheet" type="text/css" href="estiloMenu.css" media="screen">
    </head>
    <body>
        <div id="titulo">
            <div class="right">
                <img src="jgtyv.jpg" alt="">
            </div>
            
            <div class="left">
                <img src="eliminar.jpg" alt="">
                <h3>Eliminar Alumno</h3>
            </div>
        </div>
    <?php
        if(!isset($_GET['id'])){
    ?>
        <br><br><br><br><br><br><br><br><br>
        <div id="buscar">
    <form method="GET" action="EliminarAlumno.php">
        Id: <input type="text" required name="id" placeholder=" Id">
        <br><br>
        <input type="submit" value="Eliminar">
    </form>
        </div>
        
    <?php
        }else{
            $id = $_GET['id'];
            $servidor="localhost";
            $usuario="root";
            $clave="";
            $bd="ServicioSocial";

        //cerrando conexion
            $conexion = mysqli_connect($servidor, $usuario, $clave, $bd);
            $consulta = "DELETE FROM Alumnos WHERE ID=" . $id;
            mysqli_query($conexion, $consulta);
            echo "<h2>Registro Eliminado</h2>";
            mysqli_close($conexion);
        }
    ?>
        
        <div id="footer">
        <a href="index.html">Regresar a la pagina principal</a>
            </div>
    </body>
</html>