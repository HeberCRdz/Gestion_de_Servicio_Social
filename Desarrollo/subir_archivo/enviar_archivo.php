

<?php
	foreach($_FILES["archivo_fls"] as $clave => $valor){
		echo "Propiedad: $clave --- Valor: $valor<br/>";
	}
	
	$archivo = $_FILES["archivo_fls"]["tmp_name"];
	$destino = "archivos/".$_FILES["archivo_fls"]["name"];
	
	
	move_uploaded_file($archivo,$destino);
	echo "Archivo subido :)";
	
?>