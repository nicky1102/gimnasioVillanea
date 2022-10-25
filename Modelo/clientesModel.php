<?php
    class ClientesModel {
        private $db;
        private $clientes;

        public function __construct(){
            $this->db = Conexion::conexion();
            $this->clientes = array(); // variable donde se guardan los datos de los clientes posteriormente
            $this->idClientes = array();
            $this->perfilCliente = array();
            $this->usuario = array(); //para verificar el usuario y hacer el login
        }

        //REGISTRO DE CLIENTES
        public function getClientes(){
            //Script para traer los datos de Clientes
            $sql = "SELECT idUsuario,usuario,apellidos,correo,telefono,contactoEmergencia,direccion,contra,pregunta,fechaCreado,estado,idTipoUsuario
                        FROM usuario U ORDER BY idUsuario ";

            // Ejecutando el query
            $resultado = $this->db->query($sql);

            // Obteniendo los valores y guardandolos en un arrayasociativo
            while($row = $resultado->fetch_assoc()){
                $this->clientes[] = $row;
            }
            //Retornando los datos
            return $this->clientes;
        }

        public function registrarCliente($usuario, $apellidos, $correo, $telefono, $contactoEmergencia, $direccion,$contra, $pregunta,$fecha, $idTipoUsuario){
            
            $sql = "INSERT INTO usuario(usuario,apellidos,correo,telefono,contactoEmergencia,direccion,contra,pregunta,fechaCreado,idTipoUsuario)
                        VALUES ('$usuario', '$apellidos', '$correo', '$telefono', '$contactoEmergencia', '$direccion','$contra', '$pregunta','$fecha', '$idTipoUsuario')";
            $resultado = $this->db->query($sql);
        }

        public function actualizarCliente($idUsuario,$usuario, $apellidos, $correo, $telefono, $contactoEmergencia, $direccion,$contra, $pregunta,$fecha,$idTipoUsuario){
            
            $sql = "UPDATE usuario SET usuario='$usuario',apellidos='$apellidos',correo='$correo',telefono='$telefono',contactoEmergencia='$contactoEmergencia',direccion='$direccion',contra='$contra',pregunta='$pregunta',fechaCreado='$fecha', idTipoUsuario='$idTipoUsuario' 
                                        WHERE idUsuario='$idUsuario'";
            $resultado = $this->db->query($sql);
        }

        public function eliminarCliente($idUsuario){
            
            $sql = "DELETE FROM usuario WHERE idUsuario='$idUsuario'";
            $resultado = $this->db->query($sql);
        }
        //---------------------------------------------------------------------------------------------------

        public function getIdClientes(){

            $sql = "SELECT idUsuario,usuario,apellidos FROM usuario ORDER BY idUsuario ";
            $resultado = $this->db->query($sql);

            while($row = $resultado->fetch_assoc()){
                $this->idClientes[] = $row;
            }
            return $this->idClientes;
        }
        //---------------------------------------------------------------------------------------------------

        //LOGIN
        public function usuarioExiste($usuario){

            $sql = "SELECT usuario FROM usuario WHERE usuario='$usuario'";
            $resultado = $this->db->query($sql);
            $resultado = mysqli_num_rows($resultado);
            return $resultado;
        }

        public function verificarUsuario($usuario){

            $sql = "SELECT idUsuario,usuario,contra,pregunta,intentos,estado,idTipoUsuario FROM usuario WHERE usuario='$usuario'";
            $resultado = $this->db->query($sql);
            
            while($row = $resultado->fetch_assoc()){
                $this->usuario[] = $row;
            }
            return $this->usuario;
        }

        //AL PERDER 3 INTENTOS PARA HACER LOGIN
        public function actualizarEstado($idUsuario){
            
            $sql = "UPDATE usuario SET estado='I'WHERE idUsuario='$idUsuario'";
            $resultado = $this->db->query($sql);
        }

        public function actualizarIntentos($idUsuario, $intentos){
            
            $sql = "UPDATE usuario SET intentos='$intentos'WHERE idUsuario='$idUsuario'";
            $resultado = $this->db->query($sql);
        }

        //---------------------------------------------------------------------------------------------------

        //CAMBIO DE CONTRASEÑA
        public function usuarioExisteRecuperarContra($usuario,$pregunta){

            $sql = "SELECT usuario FROM usuario WHERE usuario='$usuario' AND pregunta='$pregunta'";
            $resultado = $this->db->query($sql);
            $resultado = mysqli_num_rows($resultado);
            return $resultado;
        }

        public function actualizarContra($idUsuario, $nuevaContra){
            
            $sql = "UPDATE usuario SET contra='$nuevaContra',intentos='3', estado='A' WHERE idUsuario='$idUsuario'";
            $resultado = $this->db->query($sql);
        }
        //---------------------------------------------------------------------------------------------------

        //PERFIL DEL USUARIO
        public function getPerfil($idUsuario){

            $sql = "SELECT usuario,telefono,contactoEmergencia,correo FROM usuario WHERE idUsuario='$idUsuario'";
            $resultado = $this->db->query($sql);

            while($row = $resultado->fetch_assoc()){
                $this->perfilCliente[] = $row;
            }
            return $this->perfilCliente;
        }
        //---------------------------------------------------------------------------------------------------
    }
?>