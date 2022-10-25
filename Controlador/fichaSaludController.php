<?php
    class FichaSaludController {

        //FICHAS DE SALUD
        public function mostrarFichaSalud(){
            require_once("../../Modelo/fichaSaludModel.php");
            //Invocando al modelo de fichas para hacer el llamado a la BD
            $modelo = new FichaSaludModel();
            $datos["fichas"] = $modelo->getFichaSalud(); //Obteniendo las fichas

            //Retornando los datos de las fichas
            return $datos;
        }

        public function registrarFichaSalud($idUsuario, $tallaPecho, $tallaCintura, $tallaCadera, $estatura, $peso,$masaCorporal, $masaMuscular,$enfermedades, $fecha){
            require_once("../../Modelo/FichaSaludModel.php");
            $modelo = new FichaSaludModel();
            $modelo->registrarFichaSalud($idUsuario, $tallaPecho, $tallaCintura, $tallaCadera, $estatura, $peso,$masaCorporal, $masaMuscular,$enfermedades, $fecha);
            header("Location: ../../Vista/FichaSalud/fichaSaludRegistroView.php");    
        }

        public function actualizarFichaSalud($idFichaSalud,$idUsuario, $tallaPecho, $tallaCintura, $tallaCadera, $estatura, $peso,$masaCorporal, $masaMuscular,$enfermedades, $fecha){
            require_once("../../Modelo/FichaSaludModel.php");
            $modelo = new FichaSaludModel();
            $modelo->actualizarFichaSalud($idFichaSalud,$idUsuario, $tallaPecho, $tallaCintura, $tallaCadera, $estatura, $peso,$masaCorporal, $masaMuscular,$enfermedades, $fecha);
            header("Location: ../../Vista/FichaSalud/fichaSaludRegistroView.php");    
        }

        public function eliminarFichaSalud($idFichaSalud){
            require_once("../../Modelo/FichaSaludModel.php");
            $modelo = new FichaSaludModel();
            $modelo->eliminarFichaSalud($idFichaSalud);
            header("Location: ../../Vista/FichaSalud/fichaSaludRegistroView.php");
        }
        //---------------------------------------------------------------------------------------------------

        //HISTORIAL DE SALUD
        public function mostrarFichaSaludPorUsuario($idUsuario){
            require_once("../../Modelo/fichaSaludModel.php");
            //Invocando al modelo de fichas para hacer el llamado a la BD
            $modelo = new FichaSaludModel();
            $datos["fichas"] = $modelo->getFichaSaludPorUsuario($idUsuario); //Obteniendo las fichas
            //Retornando los datos de las fichas
            return $datos;
        }

        public function datosHistorial($datos){
            foreach($datos["fichas"] as $dato){
                echo '<tr>';
                echo '<td>'.$dato['idFichaSalud'].'</td>';
                echo '<td>'.$dato['fecha'].'</td>';
                echo '<td>'.$dato['usuario'].'</td>';
                echo '<td>'.$dato['tallaPecho'].'</td>';
                echo '<td>'.$dato['tallaCintura'].'</td>';
                echo '<td>'.$dato['tallaCadera'].'</td>';
                echo '<td>'.$dato['estatura'].'</td>';
                echo '<td>'.$dato['peso'].'</td>';
                echo '<td>'.$dato['masaCorporal'].'</td>';
                echo '<td>'.$dato['masaMuscular'].'</td>';
                echo '<td>'.$dato['enfermedades'].'</td>';
                echo '<tr>';
            }
        }
        //---------------------------------------------------------------------------------------------------
    }
?>