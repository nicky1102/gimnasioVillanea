<?php
    include_once("../../config/conexion.php");
    require_once("../../Controlador/fichaSaludController.php");
    $control = new fichaSaludController();

    //Registrar un nuevo registro de salud del usuario
    if(isset($_POST['registrar'])){
        if(strlen($_POST['idUsuario']) >= 1 && strlen($_POST['tallaPecho']) >= 1 && strlen($_POST['tallaCintura']) >= 1 && 
        strlen($_POST['tallaCadera']) >= 1 && strlen($_POST['estatura']) >= 1 && strlen($_POST['peso']) >= 1 && strlen($_POST['masaCorporal']) >= 1 &&
        strlen($_POST['masaMuscular']) >= 1 && strlen($_POST['enfermedades']) >= 1 && strlen($_POST['fecha']) >= 1){
            $control->registrarFichaSalud($_POST['idUsuario'],$_POST['tallaPecho'],$_POST['tallaCintura'],$_POST['tallaCadera'],$_POST['estatura'],$_POST['peso'],$_POST['masaCorporal'],$_POST['masaMuscular'],$_POST['enfermedades'],$_POST['fecha']);
        }else{
            header("Location: fichaSaludRegistroView.php"); 
            echo '<p>NO registrado con éxito. Error: '.mysqli_error($conexion);
        }
    }

    //Actualizar el registro de salud del usuario
    if(isset($_POST['actualizar'])){
        if(strlen($_POST['idFichaSalud']) >= 1 && strlen($_POST['idUsuario']) >= 1 && strlen($_POST['tallaPecho']) >= 1 && strlen($_POST['tallaCintura']) >= 1 && 
        strlen($_POST['tallaCadera']) >= 1 && strlen($_POST['estatura']) >= 1 && strlen($_POST['peso']) >= 1 && strlen($_POST['masaCorporal']) >= 1 &&
        strlen($_POST['masaMuscular']) >= 1 && strlen($_POST['enfermedades']) >= 1 && strlen($_POST['fecha']) >= 1){
            $control->actualizarFichaSalud($_POST['idFichaSalud'],$_POST['idUsuario'],$_POST['tallaPecho'],$_POST['tallaCintura'],$_POST['tallaCadera'],$_POST['estatura'],$_POST['peso'],$_POST['masaCorporal'],$_POST['masaMuscular'],$_POST['enfermedades'],$_POST['fecha']);
        }else{
            header("Location: fichaSaludRegistroView.php"); 
            echo '<p>NO registrado con éxito. Error: ';
        }
    }

    //Eliminar el registro de salud del usuario
    if(isset($_POST['eliminar'])){
        if(strlen($_POST['idFichaSalud']) >= 1){
            $idFichaSalud = $_POST['idFichaSalud'];
            $control->eliminarFichaSalud($idFichaSalud);
        }else{
            header("Location: fichaSaludRegistroView.php"); 
            echo '<p>NO registrado con éxito. Error: '.mysqli_error($conexion);
        }
    }

    //Esto es para Vista/Historico
    if(isset($_POST['buscar'])){
        if(strlen($_POST['idUsuario']) >= 1){
            $idUsuario = $_POST['idUsuario'];
            $control->mostrarFichaSaludPorUsuario($idUsuario);
        }else{
            header("Location: historicoView.php"); 
            echo '<p>NO registrado con éxito. Error: '.mysqli_error($conexion);
        }
    }
?>