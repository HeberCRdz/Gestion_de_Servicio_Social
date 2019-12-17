<?php

include_once "SQLUsuario.php";
include_once "Usuario.php";

if(!isset($_GET['numId'])){
    
echo "<form method'GET' action='listar.php'>";
echo "<center>";

echo "<h1>Usuarios Actualmente Registrados</h1>";
    echo"<table>";
    $sqlCont = new SQLUsuario();
    $misContactos = $sqlCont->listarTodosLosUsuarios();
    for($i=0; $i<count($misContactos); $i++){
        //echo count($misContactos);prueba de funcionamiento
        $contacto = $misContactos[$i];
        echo"<tr>";
            echo "<td><input type='radio' name='numId' value='".$contacto->obtenerId()."'>" . $contacto->obtenerId() .  "</td>";
            echo "<td>" . $contacto->obtenerNombre() . "</td>";
            echo "<td>" . $contacto->obtenerApellidos() . "</td>";
            echo "<td>" . $contacto->obtenerTipo() . "</td>";
            
        echo"</tr>";
    }
    echo"<tr><td colspan='6'><input type='submit' value='Actualizar'></td></tr>";//boton actualizar

    echo "</table>";
echo "</center>";
echo "</form>";
}else{
    $numId= $_GET['numId'];
   // echo "Elegiste el id: " . $numId;//prueba de funcionamiento
    include_once "SQLUsuario.php";
    
        $sqlCont = new SQLUsuario();
        $cont = $sqlCont->obtenerUsuarioPorId($numId);
    
    echo"<form method= 'GET' action='actualizar.php'>";
    
    
    echo "<input type='hidden' name='id' value='" . $numId . "'>";
    echo"Nombre: <input type='text' name='no' value='" .$cont->obtenerNombre() . "'>";
    echo"<br>"; 
    echo "Apellidos:<input type='text' name='ap' value='" .$cont->obtenerApellidos() . "'>";
    echo '<br>';
    echo "Nombre de Usuario:<input type='text' name='us' value='" .$cont->obtenerUsuario() . "'>";
    echo '<br>';
    echo "Contraseña:<input type='password' name='cont' value='" .$cont->obtenerContrasena() . "'>";
    echo '<br>';
    echo "Tipo:<input type='text' name='tp' value='" .$cont->obtenerTipo() . "'>";
    echo"<br>";
    echo "<input type = 'submit' value= 'Actualizar'>";
    echo "<input type = 'submit' value= 'Eliminar'>";
    echo "</form>";
    echo "<br>";
    
    

    echo "<a href='eliminar.php?id= " . $numId . "'>Eliminar el registro</a>";
     echo"<br>";
    //echo "<a href='index.html?id= " . $numId . "'>Regresar a la principal</a>";
    
   }

?>

<a href='index.html?id= " "'>Regresar a la principal</a>










