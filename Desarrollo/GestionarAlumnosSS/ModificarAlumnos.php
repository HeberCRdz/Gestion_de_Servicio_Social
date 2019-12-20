<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Modificar Alumnos</title>
        <link rel="stylesheet" type="text/css" href="estiloMenu.css" media="screen">
    </head>
    <body>
        <div id="titulo">
            <div class="right">
                <img src="jgtyv.jpg" alt="">
            </div>
            
            <div class="left">
                <img src="modificar.jpg" alt="">
                <h3>Modificar Alumno</h3>
            </div>
        </div>
    <?php
        if((!isset($_GET['id'])) && (!isset($_GET['nom']))){
    ?>
        <br><br><br><br><br><br><br><br><br>
        <div id="buscar">
        <form method="GET" action="ModificarAlumnos.php">
            Id: <input type="text" required name="id" placeholder=" Id"><br><br>
            <input type="submit" value="Modificar">
        </form>
        </div>
    <?php
    }
    if((isset($_GET['id'])) && (!isset($_GET['nocontrol']))){
        $id = $_GET['id'];
        $servidor="localhost";
        $usuario="root";
        $clave="";
        $bd="ServicioSocial";

    //cerrando conexion
        $conexion = mysqli_connect($servidor, $usuario, $clave, $bd);
        $consulta = "SELECT * FROM Alumnos WHERE id=" . $id;
        $registros = mysqli_query($conexion, $consulta);
            if(mysqli_num_rows($registros) > 0){
            //Por lo menos tenemos un registro
            
            echo"<br><br><br><br><br><br><br><br><br>";
            echo"<div id='buscar'>";
            echo "<form method='GET' action='ModificarAlumnos.php'>";
            while($actual = mysqli_fetch_array($registros)){
            echo "<input type='hidden' name='id' value='".$actual['ID']."'>";    
            echo "NOCONTROL: <input type='text' required name='nocontrol' placeholder=' No. Control' value='".$actual['NOCONTROL']."'>";
            echo "<br>";
            echo "<br>";
            echo "CARRERA: <input type='text' required name='carrera' placeholder=' Carrera' value='".$actual['CARRERA']."'>";
            echo "<br>";
            echo "<br>";
            echo "SEMESTRE: <input type='text' required name='semestre' placeholder=' Semestre' value='".$actual['SEMESTRE']."'>";
            echo "<br>";
            echo "<br>";
            echo "IDUSUARIO: <input type='text' required name='idusuario' placeholder=' Id Usuario' value='".$actual['IDUSUARIO']."'>";
            echo "<br>";
            echo "<br>";
            echo "<input type='submit' value='Modificar'>";
                }
                echo "</form>";
                echo"</div>";
            }
        mysqli_close($conexion);
        }

        if((isset($_GET['id'])) && (isset($_GET['nocontrol']))){
            $id = $_GET['id'];
            $nocontrol = $_GET['nocontrol'];
            $carrera = $_GET['carrera'];
            $semestre = $_GET['semestre'];
            $idus = $_GET['idusuario'];
            
            
        $servidor="localhost";
        $usuario="root";
        $clave="";
        $bd="ServicioSocial";

    //cerrando conexion
        $conexion = mysqli_connect($servidor, $usuario, $clave, $bd);
        $consulta = "UPDATE Alumnos SET NOCONTROL='" . $nocontrol . "', CARRERA='" . $carrera . "', SEMESTRE=" . $semestre . ", IDUSUARIO=" . $idus . " WHERE ID=" . $id;
        echo $consulta;
        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        echo "<h2>Registro Actualizado</h2>";
        }
    ?> 
        <div id="footer">
        <a href="index.html">Regresar a Pagina Principal</a>
            </div>
    </body>

</html>