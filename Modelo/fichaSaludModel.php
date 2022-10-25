<?php
    class FichaSaludModel {
        private $db;
        private $fichaSalud;

        public function __construct(){
            $this->db = Conexion::conexion();
            $this->fichaSalud = array(); // variable donde se guardan los datos de las fichas posteriormente
        }

        public function getFichaSalud(){
            //Script para traer los datos de las fichas
            $sql = "SELECT idFichaSalud,U.idUsuario, U.usuario,tallaPecho,tallaCintura,tallaCadera,estatura,peso,masaCorporal,masaMuscular,enfermedades,fecha
                        FROM fichaSalud FSA INNER JOIN usuario U ON U.idUsuario = FSA.idUsuario
                            ORDER BY idFichaSalud";

            // Ejecutando el query
            $resultado = $this->db->query($sql);

            // Obteniendo los valores y guardandolos en un array asociativo
            while($row = $resultado->fetch_assoc()){
                $this->fichaSalud[] = $row;
            }
            //Retornando los datos
            return $this->fichaSalud;
        }

        public function getFichaSaludPorUsuario($idUsuario){
            //Script para traer los datos de las fichas
            $sql = "SELECT idFichaSalud,U.idUsuario, U.usuario,tallaPecho,tallaCintura,tallaCadera,estatura,peso,masaCorporal,masaMuscular,enfermedades,fecha
                        FROM fichaSalud FSA INNER JOIN usuario U ON U.idUsuario = FSA.idUsuario
                            WHERE U.idUsuario='$idUsuario'";

            // Ejecutando el query
            $resultado = $this->db->query($sql);

            // Obteniendo los valores y guardandolos en un array asociativo
            while($row = $resultado->fetch_assoc()){
                $this->fichaSalud[] = $row;
            }
            //Retornando los datos
            return $this->fichaSalud;
        }

        public function registrarFichaSalud($idUsuario, $tallaPecho, $tallaCintura, $tallaCadera, $estatura, $peso,$masaCorporal, $masaMuscular,$enfermedades, $fecha){
            
            //Script para insertar los datos de una ficha
            $sql = "INSERT INTO fichaSalud(idUsuario,tallaPecho,tallaCintura,tallaCadera,estatura,peso,masaCorporal,masaMuscular,enfermedades,fecha)
                        VALUES ('$idUsuario', '$tallaPecho', '$tallaCintura', '$tallaCadera', '$estatura', '$peso','$masaCorporal','$masaMuscular', '$enfermedades', '$fecha')";
            // Ejecutando el query
            $resultado = $this->db->query($sql);
        }

        public function actualizarFichaSalud($idFichaSalud,$idUsuario, $tallaPecho, $tallaCintura, $tallaCadera, $estatura, $peso,$masaCorporal, $masaMuscular,$enfermedades, $fecha){
            
            //Script para actualizar los datos de una ficha según su ID
            $sql = "UPDATE fichaSalud SET idUsuario='$idUsuario',tallaPecho='$tallaPecho',tallaCintura='$tallaCintura',tallaCadera='$tallaCadera',estatura='$estatura',peso='$peso',masaCorporal='$masaCorporal',masaMuscular='$masaMuscular',enfermedades='$enfermedades',fecha='$fecha'
                                        WHERE idFichaSalud='$idFichaSalud'";
            // Ejecutando el query
            $resultado = $this->db->query($sql);
        }

        public function eliminarFichaSalud($idFichaSalud){
            
            //Script para eliminar una ficha de salud según su ID
            $sql = "DELETE FROM fichaSalud WHERE idFichaSalud='$idFichaSalud'";
            // Ejecutando el query
            $resultado = $this->db->query($sql);
        }
    }
?>