<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
</head>

<body>
   <?php
    if(!isset($_GET['nombre'])){
    ?>
    <div class="contenedor" aligne="center">
    <form method="GET" action="CrearUsuario.php" >
        ID:<input type="text" name="id">
        <br>
        Nombre:<input type="text" name="nombre">
        <br>
        Apellidos:<input type="text" name="apellidos">
        <br>
        Nombre de Usuario:<input type="text" name="usuario">
        <br>
        Contraseña:<input type="password" name="contrasena">
        <br>
        Tipo:<input type="text" name="tipo">
         <br>
         <input type="submit" value="Enviar">
         
    </form>
    </div>
    <?php
        }else {
            $id = $_GET['id'];
            $nombre = $_GET['nombre'];
            $apellidos = $_GET['apellidos'];
            $usuario = $_GET['usuario'];
            $contrasena = $_GET['contrasena'];
            $tipo = $_GET['tipo'];
        include_once "SQLUsuario.php";
        include_once "Usuario.php";
        $persona= new Usuario($id,$nombre,$apellidos,$usuario,$contrasena,$tipo);
        $sqlusuario = new SQLUsuario();
        $sqlusuario->agregarUsuario($persona);
        echo "<h2>Registro Almacenado</h2>";
        }
    
    ?>
    <br><br>
    <a href='index.html?id= " "'>Regresar a la principal</a>
    

</body>
</html>
