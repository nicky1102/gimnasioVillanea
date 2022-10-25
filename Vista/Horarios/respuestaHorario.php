<?php
    include_once("../../config/conexion.php");
    require_once("../../Controlador/CrearHorariosController.php");
    $control = new CrearHorariosController();

    if(isset($_POST['registrar'])){
        if(strlen($_POST['fecha']) >= 1 && strlen($_POST['horaInicio']) >= 1 && strlen($_POST['horaFin']) >= 1 && strlen($_POST['cupoLimite']) >= 1){
            $control->registrarHorario($_POST['fecha'],$_POST['horaInicio'],$_POST['horaFin'],$_POST['cupoLimite']);
        }else{
            header("Location: CrearHorariosView.php");
        }
    }

    if(isset($_POST['actualizar'])){
        if(strlen($_POST['idHorarios']) >= 1 &&strlen($_POST['fecha']) >= 1 && strlen($_POST['horaInicio']) >= 1 && strlen($_POST['horaFin']) >= 1 && strlen($_POST['cupoLimite']) >= 1){
            $control->actualizarHorario($_POST['idHorarios'],$_POST['fecha'],$_POST['horaInicio'],$_POST['horaFin'],$_POST['cupoLimite']);
        }else{
            header("Location: CrearHorariosView.php"); 
            echo '<p>NO registrado con éxito. Error: ';
        }
    }
    
    if(isset($_POST['eliminar'])){
        if(strlen($_POST['idHorarios']) >= 1){
            $idHorarios = $_POST['idHorarios'];
            $control->eliminarHorario($idHorarios);
        }else{
            header("Location: CrearHorariosView.php"); 
            echo '<p>NO registrado con éxito. Error: '.mysqli_error($conexion);
        }
    }
?>