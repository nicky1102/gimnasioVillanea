<?php
    class CrearHorariosController {

        public function mostrarHorarios(){
            require_once("../../Modelo/CrearHorariosModel.php");
            //Invocando al modelo de Horarios para hacer el llamado a la BD
            $modelo = new CrearHorariosModel();
            $datos["Horarios"] = $modelo->getHorarios(); //Obteniendo los horarios

            //Retornando los datos
            return $datos;
        }

        public function registrarHorario($fecha,$horaInicio,$horaFin,$cupoLimite){
            require_once("../../Modelo/CrearHorariosModel.php");
            $modelo = new CrearHorariosModel();
            $modelo->registrarHorario($fecha,$horaInicio,$horaFin,$cupoLimite);
            header("Location: ../../Vista/Horarios/CrearHorariosView.php");    
        }

        public function actualizarHorario($idHorarios,$fecha,$horaInicio,$horaFin,$cupoLimite){
            require_once("../../Modelo/CrearHorariosModel.php");
            $modelo = new CrearHorariosModel();
            $modelo->actualizarHorario($idHorarios,$fecha,$horaInicio,$horaFin,$cupoLimite);
            header("Location: ../../Vista/Horarios/CrearHorariosView.php");    
        }

        public function eliminarHorario($idHorarios){
            require_once("../../Modelo/CrearHorariosModel.php");
            $modelo = new CrearHorariosModel();
            $modelo->eliminarHorario($idHorarios);
            header("Location: ../../Vista/Horarios/CrearHorariosView.php");
        }

        public function mostrarIdHorario(){
            require_once("../../Modelo/CrearHorariosModel.php");
            $modelo = new CrearHorariosModel();
            $datos["datosHorario"] = $modelo->getIdHorario();

            return $datos;
        }
    }
?>