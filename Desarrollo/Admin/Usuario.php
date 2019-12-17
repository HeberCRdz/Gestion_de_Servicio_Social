<?php 
    class Usuario {
        private $id;
        private $nombre;
        private $apellidos;
        private $usuario;
        private $contrasena;
        private $tipo;

        function __construct($id, $nombre, $apellidos, $usuario, $contrasena, $tipo){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->usuario = $usuario;
            $this->contrasena = $contrasena;
            $this->tipo = $tipo;
        }

        //***************** Id

        public function asignarId($nuevoId){
            $this->id = $nuevoId;
        }

        public function obtenerId(){
            return $this->id;
        }

        //***************** Nombre

        public function asignarNombre($nuevoNombre){
            $this->nombre = $nuevoNombre;
        }

        public function obtenerNombre(){
            return $this->nombre;
        }

        //***************** Apellidos

        public function asignarApellidos($nuevoApellidos){
            $this->apellidos = $nuevoApellidos;
        }

        public function obtenerApellidos(){
            return $this->apellidos;
        }

        //***************** Usuario

        public function asignarUsuario($nuevoUsuario){
            $this->usuario = $nuevoUsuario;
        }

        public function obtenerUsuario(){
            return $this->usuario;
        }
        
        //***************** Contraseña

        public function asignarContrasena($nuevoContrasena){
            $this->contrasena = $nuevoContrasena;
        }

        public function obtenerContrasena(){
            return $this->contrasena;
        }
        
        //***************** Tipo

        public function asignarTipo($nuevoTipo){
            $this->tipo = $nuevoTipo;
        }

        public function obtenerTipo(){
            return $this->tipo;
        }
    }

?>