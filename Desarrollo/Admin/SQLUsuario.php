<?php
    include_once "MYSQLConector.php";
    include_once "Usuario.php";

    class SQLUsuario {

        private $mysql;
        private $misUsuarios;

        function __construct(){
            
        }
        
        public function obtenerUsuarioPorId($id){
            $Usuario = null;
            $mysql = new MYSQLConector();
            $mysql->Open();
            $consulta = "SELECT * FROM usuarios WHERE id=" . $id;
            $res = $mysql->Query($consulta);
            while($actual = mysqli_fetch_array($res)){
              $Usuario  = new Usuario($actual['ID'], $actual['NOMBRE'], $actual['APELLIDOS'], $actual['NOMBREUSUARIO'], $actual['CONTRASENIA'], $actual['TIPO']); 
            }
            $mysql->Close();
            return $Usuario;
        }
        
        public function actualizarUsuario($cont){
            $mysql = new MYSQLConector();
            $mysql->Open();
            $consulta = "UPDATE usuarios SET  NOMBRE='". $cont->obtenerNombre() . "', APELLIDOS='" . $cont->obtenerApellidos() . "', NOMBREUSUARIO='" . $cont->obtenerUsuario() . "', CONTRASENIA='". $cont->obtenerContrasena() . "', TIPO='". $cont->obtenerTipo() . "' WHERE ID=" .$cont->obtenerId();
            $res = $mysql->Query($consulta);
            $mysql->Close();
        }
        
        public function eliminarPorId($id){
            $mysql = new MYSQLConector();
            $mysql->Open();
            $consulta = "DELETE FROM usuarios WHERE id= " . $id;
            $res = $mysql->Query($consulta);
            $mysql->Close();
            
        }
        
        public function listarTodosLosUsuarios(){
            $mysql = new MYSQLConector();
            $mysql->Open();
            $consulta = "SELECT * FROM usuarios";
            $res = $mysql->Query($consulta);
            
            $cont=0;
            while($actual = mysqli_fetch_array($res)){
                //mi contacto es una instancia para meter al arreglo mis contactos
                $miUsuario = new Usuario($actual['ID'], $actual['NOMBRE'], $actual['APELLIDOS'], $actual['NOMBREUSUARIO'],$actual['CONTRASENIA'], $actual['TIPO']);
                $this->misUsuarios[$cont]=$miUsuario;
                $cont++;
            }
            
            $mysql->Close();
            return $this->misUsuarios;
        }

        public function agregarUsuario($Usuario){
            $mysql = new MySQLConector();
            $mysql->Open();
            $consulta = "INSERT INTO usuarios (id, nombre, apellidos, nombreusuario, contrasenia, tipo) VALUES( '" .
                        $Usuario->obtenerID() . "', '" .
                        $Usuario->obtenerNombre() . "', '" .
                        $Usuario->obtenerApellidos() . "','".
                        $Usuario->obtenerUsuario() . "', '" .
                        $Usuario->obtenerContrasena() . "', '" .
                        $Usuario->obtenerTipo(). "')";

            $mysql->Query($consulta);
            $mysql->Close();
        }

    }

?>