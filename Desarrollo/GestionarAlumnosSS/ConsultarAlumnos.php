<?php

    echo"<head>";
        echo"<title>Consultar Alumnos</title>";
    echo"</head>";
    echo"<body>";
        echo"<div id='titulo'>";
            echo"<div class='right'>";
                echo"<img src='jgtyv.jpg' alt=''>";
            echo"</div>";
            
            echo"<div class='left'>";
                echo"<img src='consultar.jpg' width='100px', height='100px'>";
                echo"<h3>Lista de Alumnos</h3>";
            echo"</div>";
        echo"</div>";
    echo "<link rel='stylesheet' type='text/css' href='estiloMenu.css' media='screen'>";

    $servidor="localhost";
    $usuario="root";
    $clave="";
    $bd="serviciosocial";

    //cerrando conexion
    $conexion = mysqli_connect($servidor, $usuario, $clave, $bd);
    $consulta = "SELECT * FROM alumnos";
    $registros = mysqli_query($conexion, $consulta);
    if(mysqli_num_rows($registros) > 0){
        echo"<div id='tabla'>";
        echo "<table>";
        echo "<th>Id</th><th>NOCONTROL</th><th>CARRERA</th><th>SEMESTRE</th><th>IDUSUARIO</th>";
        while($actual = mysqli_fetch_array($registros)){
            echo "<tr>";
            echo "<td>" . $actual['ID'] . "</td>";
            echo "<td>" . $actual['NOCONTROL'] . "</td>";
            echo "<td>" . $actual['CARRERA'] . "</td>";
            echo "<td>" . $actual['SEMESTRE'] . "</td>";
            echo "<td>" . $actual['IDUSUARIO'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo"</div>";
    }
    mysqli_close($conexion);

    echo "<div id='footer'>";
    echo "<a href=\"index.html\">Regresar a la pagina principal</a>";
    echo "</div>";
?>