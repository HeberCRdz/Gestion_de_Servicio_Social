<?php

$id = $_GET['id'];

include_once "SQLUsuario.php";
$sqlCont = new SQLUsuario();
$sqlCont->eliminarPorId($id);
echo "<h2>Usuario eliminado correctamente</h2>";
echo "<br>";
echo "<a href='index.html'>Regresar al principal</a>";

?>