<?php

    echo"<head>";
        echo"<title>Alumno Agregado</title>";
    echo"</head>";
    echo"<body>";
        echo"<div id='titulo'>";
            echo"<div class='right'>";
                echo"<img src='jgtyv.jpg' alt=''>";
            echo"</div>";
            
            echo"<div class='left'>";
                echo"<img src='agregar.jpg' width='100px', height='100px'>";
                echo"<h3>Alumno Agregado</h3>";
            echo"</div>";
        echo"</div>";
    echo "<link rel='stylesheet' type='text/css' href='estiloMenu.css' media='screen'>";

    $id = $_GET["id"];
    $noCon = $_GET["nocontrol"];
    $carrera = $_GET["carrera"];
    $sem = $_GET["semestre"];
    $idUs = $_GET["idusuario"];
    

    $servidor="localhost";
    $usuario="root";
    $clave="";
    $bd="ServicioSocial";

    //cerrando conexion
    $conexion = mysqli_connect($servidor, $usuario, $clave, $bd);
    $consulta = "INSERT INTO Alumnos (NOCONTROL, CARRERA, SEMESTRE, IDUSUARIO) VALUES ('$noCon', '$carrera', '$sem', '$idUs')";
    echo"<br><br><br><br><br><br><br><br>";
    echo $consulta;
    echo "<br>";

    echo"<div id='guardar'";
    echo "<h2>Registro Guardado :)</h2>";
    echo"</div>";
    
    echo"<br>";
    echo "<div id='footer'>";
    echo "<a href='index.html'>Regresar al Menu</a>";
    echo "</div>";
    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);
?>