<form name="frmLogin" method="POST" action="<?php echo URL::construir("index", "ingresar")?>" onsubmit="return validar()">
    <label>Usuario:</label><input name="usuario" type="text"><br>
    <label>Contraseña:</label><input name="contrasenia" type="password"><br>
    <input type="submit" value="Ingresar">
</form>
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