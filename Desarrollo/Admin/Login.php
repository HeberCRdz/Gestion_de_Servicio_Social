<?php 
   include_once "MYSQLConector.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Gestiòn de Servicio Social</title>
    </head>
    <body>
       <!-- <?php
            if(!isset($_GET['USUARIO'])){
        ?>-->
        <form name="form" method="GET" action="Login.php" onsubmit="return validar()">
        Usuario: <input type="text" name="USUARIO">
            <br>
        Contraseña: <input type="password" name="CONTRASENA">
            <br>
        
        <input type="submit" value="Enviar">
        </form>
        <a href="MenuAdmin.php"></a>
        <!--<?php
            }else {
                $usuario = $_GET['USUARIO'];
                $contrasena = $_GET['CONTRASENA'];

                include_once "MySQLConector.php";
                $con=new Conector();               
                $resultado = $con->Query("select *from usuarios where               NOMBREUSUARIO='$usuario' and CONTRASENIA='$contrasena' ");
                
                if(count($resultado) <= 0){
                    echo "Usuario o contrasenia incorrecta";
                    echo "<br><a href='Login.php'>Regresar</a>";
                }else{
                    $_SESSION["usuario"] = $resultado;
                    header("Location: index.html");
                }
        
            }
        ?>-->
    </body>
</html>

<script>
    function validar(){
        if(document.form.USUARIO.value == ""){
            alert("el nombre de usuario es necesario");
            return false;
        }
        if(document.form.CONTRASENA.value == ""){
            alert("La contrasenia es necesaria");
            return false;
        }
        
        return true;
    }
</script>