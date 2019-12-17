<?php

$id = $_GET['id'];
$nombre = $_GET['no'];
$apellidos = $_GET['ap'];
$usuario = $_GET['us'];
$contrasena = $_GET['cont'];
$tipo = $_GET['tp'];

include_once "Usuario.php";
include_once "SQLUsuario.php";

$usuarios = new Usuario($id, $nombre, $apellidos, $usuario, $contrasena, $tipo);
$sqlUs = new SQLUsuario();
$sqlUs->actualizarUsuario($usuarios);

echo "<h2>Usuario actualizado</h2>";
echo "<br>";
echo "<a href='index.html'>Regresar al principal</a>";
?>