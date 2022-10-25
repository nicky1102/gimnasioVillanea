<?php
    session_start();
    include_once("../../config/conexion.php");
    require_once("../../Controlador/AgendarController.php");
    $control = new AgendarController();

    if(isset($_POST['aceptar'])){
        if(strlen($_POST['sesion']) >= 1 && strlen($_POST['metodo']) >= 1 && strlen($_SESSION['usuario']) >= 1){
            $control->registrarAgenda($_POST['sesion'],$_POST['metodo'],$_SESSION['usuario']);
        }else{
            header("Location: AgendarView.php");
        }
    }
?>