<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registrar datos SS</title>
        
		<link rel="stylesheet" type="text/css" href="estilo.css">
        <p align=left><img src="imagenes/logogtyv.png"></p>
    </head>
    <body>
        <?php
            date_default_timezone_set('America/Mexico_City');
            /* 
                FORMATO DE FECHAS 
            */
            $FECHAINICIO=date("Y-m-d"); 
            $FECHAFINAL=date("Y-m-d");
            if(!isset($_GET['ID'])){
        ?>
        <p align=center>REGISTRAR DATOS DEL SERVICIO SOCIAL</p>
        <div class="form"> 
        <form name="form" onsubmit="return validar()" method="GET" action="RegistrarDatosSS.php">
        ID: <input type="text" name="ID" placeholder="ID" required>
            <br>
            <br>
        PROGRAMA: <input type="text" name="PROGRAMA" placeholder="PROGRAMA" required>
            <br>
            <br>
        DEPENDENCIA: <input type="text" name="DEPENDENCIA" placeholder="DEPENDENCIA" required>
            <br>
            <br>
        FECHAINICIO: <input type="text" id="FECHAINICIO" name="FECHAINICIO" value="<?= $FECHAINICIO?>" placeholder="DD/MM/YYYY" required>
            <br>
            <br>
        FECHAFINAL: <input type="text" id="FECHAFINAL" name="FECHAFINAL"  value="<?= $FECHAFINAL?>" placeholder= "DD/MM/YYYY" required>
            <br>
            <br>
        IDALUMNO: <input type="text" name="IDALUMNO" placeholder="IDALUMNO" required>		
            <br>
            <br>
        <input type="submit" value="REGISTRAR">
        </form>               
		</div>
        <?php
            }else {
                $ID = $_GET['ID'];
                $PROGRAMA = $_GET['PROGRAMA'];
                $DEPENDENCIA = $_GET['DEPENDENCIA'];
                $FECHAINICIO = $_GET['FECHAINICIO'];
                $FECHAFINAL = $_GET['FECHAFINAL'];
                $IDALUMNO = $_GET['IDALUMNO'];
  
                include_once "MYSQLConector.php";
                $con=new MYSQLConector();  

                $con->Query("insert into informacionservicio(PROGRAMA,DEPENDENCIA,FECHAINICIO,FECHAFINAL,IDALUMNO)VALUES('$PROGRAMA','$DEPENDENCIA','$FECHAINICIO','$FECHAFINAL','$IDALUMNO')");
        
                echo "Guardado";     
          }    
        ?>
        <section>
        <footer>
            <p align= center>ITSZN 2019</p>
        </footer>
        </section>
    </body>
</html>