<?php
    class CrearHorariosModel {
        private $db;
        private $horarios;

        public function __construct(){
            $this->db = Conexion::conexion();
            $this->horarios = array(); // variable donde se guardan los datos
            $this->idHorarios = array();
        }

        //REGISTRO DE HORARIOS
        public function getHorarios(){
            //Script para traer los horarios
            $sql = "SELECT idHorarios,fecha,horaInicio,horaFin,cupoLimite
                        FROM Horarios U ORDER BY idHorarios ";

            // Ejecutando el query
            $resultado = $this->db->query($sql);

            // Obteniendo los valores y guardandolos en un arrayasociativo
            while($row = $resultado->fetch_assoc()){
                $this->horarios[] = $row;
            }
            //Retornando los datos
            return $this->horarios;
        }

        public function registrarHorario($fecha,$horaInicio,$horaFin,$cupoLimite){
            
            $sql = "INSERT INTO horarios(fecha,horaInicio,horaFin,cupoLimite)
                        VALUES ('$fecha', '$horaInicio', '$horaFin', '$cupoLimite')";
            $resultado = $this->db->query($sql);
        }

        public function actualizarHorario($idHorarios,$fecha,$horaInicio,$horaFin,$cupoLimite){
            
            $sql = "UPDATE horarios SET fecha='$fecha',horaInicio='$horaInicio',horaFin='$horaFin',cupoLimite='$cupoLimite'
                                        WHERE idHorarios='$idHorarios'";
            $resultado = $this->db->query($sql);
        }

        public function eliminarHorario($idHorarios){
            
            $sql = "DELETE FROM horarios WHERE idHorarios='$idHorarios'";
            $resultado = $this->db->query($sql);
        }

        public function getIdHorario(){

            $sql = "SELECT idHorarios,fecha,horaInicio,horaFin FROM horarios ORDER BY idHorarios ";
            $resultado = $this->db->query($sql);

            while($row = $resultado->fetch_assoc()){
                $this->idHorarios[] = $row;
            }
            return $this->idHorarios;
        }
        //---------------------------------------------------------------------------------------------------
    }
?>