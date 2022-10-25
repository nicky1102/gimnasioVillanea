<?php
    class AgendarController {

         //FICHAS DE SALUD
         public function mostrarHistorial(){
            require_once("../../Modelo/AgendarModel.php");
            $modelo = new AgendarModel();
            $datos["usuario"] = $modelo->getHistorico();

            return $datos;

        }

        public function registrarAgenda($sesion,$metodo,$usuario){
            require_once("../../Modelo/AgendarModel.php");
            $modelo = new AgendarModel();
            $modelo->registrarAgenda($sesion,$metodo,$usuario);
            header("Location: ../../Vista/Horarios/AgendarView.php");    
        }

        //HISTORIAL
        public function mostrarFichaSaludPorUsuario($idUsuario){
            require_once("../../Modelo/fichaSaludModel.php");
            //Invocando al modelo de fichas para hacer el llamado a la BD
            $modelo = new FichaSaludModel();
            $datos["fichas"] = $modelo->getFichaSaludPorUsuario($idUsuario); 
            //Retornando los datos de las fichas
            return $datos;

        }

        public function datosHistorial($datos){
            foreach($datos["usuario"] as $dato){
                echo '<tr>';
                echo '<td>'.$dato['idAgenda'].'</td>';
                echo '<td>'.$dato['sesion'].'</td>';
                echo '<td>'.$dato['metodo'].'</td>';
                echo '<td>'.$dato['usuario'].'</td>';
                echo '<td>'.$dato['estadoPagado'].'</td>';
                echo '<tr>';
            }
       }
}
?>