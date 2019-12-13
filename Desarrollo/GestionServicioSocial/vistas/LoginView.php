<?php
    require_once(dirname(__DIR__)."/componentes/Encabezado.php");
?>
<link rel="stylesheet" type="text/css" href="css/estilo_base.css">
<div class="main-contenedor">
    <form name="frmLogin" class="form" method="POST" action="<?php echo URL::construir("index", "ingresar")?>" onsubmit="return validar()">
        <div class="form-group group-center">
            <h2 class="form-title">INICIAR SESIÓN</h2>
        </div>
        <div class="form-group group-center">
            <img class="login-img" src="imagenes/usuario.png">
        </div>
        <div class="form-group">
            <div class="form-col">
                <label>Usuario:</label>
            </div>
            <div class="form-col">
                <input id="user" name="usuario" type="text">
            </div>
        </div>
        <div class="form-group">
            <div class="form-col">
                <label>Contraseña:</label>
            </div>
            <div class="form-col">
                <input name="contrasenia" type="password">
            </div>  
        </div>
        <div class="form-group">
            <div class="form-col group-right">
                <input class="button" type="submit" value="Ingresar">
             </div>  
        </div>
    </form>
</div>
<script>
    function validar(){
        if(document.frmLogin.usuario.value == ""){
            alert("El usuario es un dato necesario");
            return false;
        }else if(document.frmLogin.contrasenia.value == ""){
            alert("La contraseña es un dato necesario");
            return false;
        }
        return true;
    }
</script>
<?php
    require_once(dirname(__DIR__)."/componentes/PiePagina.php");
?>