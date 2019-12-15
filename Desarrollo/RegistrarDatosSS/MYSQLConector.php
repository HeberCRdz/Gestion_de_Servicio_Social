<?php
	class MYSQLConector {
	private $servidor;
	private $usuario;
	private $contrasenia;
	private $bd;
	private $conexion;
	
	function __construct(){
		$this->servidor = "localhost:3308";
		$this->usuario = "root";
		$this->clave = "";
		$this->bd = "serviciosocial";
	}
		function Open(){
				$this->conexion = mysqli_connect($this->servidor,$this->usuario,$this->clave,$this->bd);
		}
		function Query($sqlquery){
                $this->Open();
				$respuesta = mysqli_query($this->conexion, $sqlquery);
				if (!$respuesta){
					echo "SQL error";
					exit;
				}
		}
		function Close(){
				mysqli_close($this->conexion);
				$this->conexion = null;
		}
	}
?>