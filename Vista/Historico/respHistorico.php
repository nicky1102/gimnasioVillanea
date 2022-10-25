<?php
    session_start();
    include_once("../../config/conexion.php");
    require_once("../../Controlador/FichaSaludController.php");
    $control = new FichaSaludController();

    $idUsuario = $_GET['idUsuario'];
    $_SESSION['id'] = $idUsuario; //para poder tener el id del cliente
    $datos = $control->mostrarFichaSaludPorUsuario($idUsuario);
    $control->datosHistorial($datos);//LLAMANDO A LA FUNCIÓN QUE CONTIENE EL TABLE BODY CON LOS DATOS CARGADOS
?>