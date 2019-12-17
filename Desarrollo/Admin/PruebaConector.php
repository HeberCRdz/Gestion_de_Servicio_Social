<?php
    include_once "MYSQLConector.php";
    include_once "Usuario.php";
    include_once "SQLUsuario.php";

    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";

    $mysql = new MYSQLConector();
    $mysql->Open();
    $agenda = "SELECT * FROM usuarios";
    $resultado = $mysql->Query($usuarios);
    while($row = mysqli_fetch_array($resultado)){
        echo $row["id"]. " " .$row["nombre"]. "  ". $row["apellidos"] . " " .$row["usuario"]. " " .$row["contrasena"]. " " .$row["tipo"]. "  ;
        echo "<br>";
    }
    $mysql->Close();

    echo "</html>"
?>