<?php
    class AgendarModel {
        private $db;
        private $historico;

        public function __construct(){
            $this->db = Conexion::conexion();
            $this->historico = array();
        }

        public function getHistorico(){

            $sql = "SELECT sesion,metodo,usuario,estadoPagado
                        FROM agendado FSA INNER JOIN usuario U ON U.idUsuario = FSA.idUsuario
                            ORDER BY idAgendado";

            $resultado = $this->db->query($sql);

            while($row = $resultado->fetch_assoc()){
                $this->historico[] = $row;
            }

            return $this->historico;
        }

        public function registrarAgenda($sesion,$metodo,$usuario){
            
            $sql = "INSERT INTO agendado(sesion,metodo,usuario)
                        VALUES ('$sesion', '$metodo', '$usuario')";
            $resultado = $this->db->query($sql);
        } 
    }
?>