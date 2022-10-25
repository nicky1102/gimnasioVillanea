<?php
    class ClientesController {

        public function mostrarClientes(){
            require_once("../../Modelo/clientesModel.php");
            //Invocando al modelo de Clientes para hacer el llamado a la BD
            $modelo = new ClientesModel();
            $datos["clientes"] = $modelo->getClientes(); //Obteniendo los clientes

            //Retornando los datos de clientes
            return $datos;
        }

        public function registrarCliente($usuario,$apellidos,$email,$telefono,$contactoEmergencia,$direccion,$contrasena,$pregunta,$fecha,$tipoUsuario){
            require_once("../../Modelo/clientesModel.php");
            $modelo = new ClientesModel();
            $modelo->registrarCliente($usuario,$apellidos,$email,$telefono,$contactoEmergencia,$direccion,$contrasena,$pregunta,$fecha,$tipoUsuario);
            header("Location: ../../Vista/Clientes/clientesRegistroView.php");    
        }

        public function actualizarCliente($idUsuario,$usuario,$apellidos,$email,$telefono,$contactoEmergencia,$direccion,$contrasena,$pregunta,$fecha,$tipoUsuario){
            require_once("../../Modelo/clientesModel.php");
            $modelo = new ClientesModel();
            $modelo->actualizarCliente($idUsuario,$usuario,$apellidos,$email,$telefono,$contactoEmergencia,$direccion,$contrasena,$pregunta,$fecha,$tipoUsuario);
            header("Location: ../../Vista/Clientes/clientesRegistroView.php");    
        }

        public function eliminarCliente($idUsuario){
            require_once("../../Modelo/clientesModel.php");
            $modelo = new ClientesModel();
            $modelo->eliminarCliente($idUsuario);
            header("Location: ../../Vista/Clientes/clientesRegistroView.php");
        }

        public function mostrarIdClientes(){
            require_once("../../Modelo/clientesModel.php");
            //Invocando al modelo de Clientes para hacer el llamado a la BD
            $modelo = new ClientesModel();
            $datos["datosClientes"] = $modelo->getIdClientes();

            //Retornando los datos de clientes
            return $datos;
        }

        public function usuarioExiste($usuario){
            require_once("../../Modelo/clientesModel.php");
            $modelo = new ClientesModel();
            $existe = $modelo->usuarioExiste($usuario);
            return $existe; //1 = existe 0 = no existe
        }

        public function usuarioExisteRecuperarContra($usuario,$pregunta){
            require_once("../../Modelo/clientesModel.php");
            $modelo = new ClientesModel();
            $existe = $modelo->usuarioExisteRecuperarContra($usuario,$pregunta);
            return $existe; //1 = existe 0 = no existe
        }

        public function actualizarContra($idUsuario, $nuevaContra){
            require_once("../../Modelo/clientesModel.php");
            $modelo = new ClientesModel();
            $existe = $modelo->actualizarContra($idUsuario, $nuevaContra);
            header("Location: ../../Vista/Login/loginView.php");
        }

        public function verificarUsuario($usuario){
            require_once("../../Modelo/clientesModel.php");
            //Invocando al modelo de Clientes para hacer el llamado a la BD
            $modelo = new ClientesModel();
            $datos["usuario"] = $modelo->verificarUsuario($usuario); //Obteniendo el usuario

            //Retornando los datos de clientes
            return $datos;
        }

        public function actualizarEstado($idUsuario){
            require_once("../../Modelo/clientesModel.php");
            $modelo = new ClientesModel();
            $modelo->actualizarEstado($idUsuario);
            header("Location: ../../Vista/Login/loginView.php");    
        }

        public function actualizarIntentos($idUsuario, $intentos){
            require_once("../../Modelo/clientesModel.php");
            $modelo = new ClientesModel();
            $modelo->actualizarIntentos($idUsuario, $intentos);
            header("Location: ../../Vista//Login/loginView.php");    
        }

        public function mostrarPerfil($idUsuario){
            require_once("../../Modelo/clientesModel.php");
            //Invocando al modelo de Clientes para hacer el llamado a la BD
            $modelo = new ClientesModel();
            $datos["datosPerfil"] = $modelo->getPerfil($idUsuario); //Obteniendo el cliente

            //Retornando los datos de clientes
            return $datos;
        }
    }
?>