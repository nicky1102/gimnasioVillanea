<?php
    include_once("../../config/conexion.php");
    require_once("../../Controlador/clientesController.php");
    $control = new ClientesController();

    if(isset($_POST['registrar'])){
        if(strlen($_POST['usuario']) >= 1 && strlen($_POST['apellidos']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['telefono']) >= 1 && 
        strlen($_POST['contactoEmergencia']) >= 1 && strlen($_POST['direccion']) >= 1 && strlen($_POST['contra']) >= 1 && strlen($_POST['pregunta']) >= 1 &&
        strlen($_POST['fechaCreado']) >= 1 && strlen($_POST['tipoUsuario']) >= 1){
            $control->registrarCliente(mb_strtoupper($_POST['usuario'],'utf-8'),mb_strtoupper($_POST['apellidos'],'utf-8'),$_POST['correo'],$_POST['telefono'],$_POST['contactoEmergencia'],$_POST['direccion'],$_POST['contra'],mb_strtoupper($_POST['pregunta'],'utf-8'),$_POST['fechaCreado'],$_POST['tipoUsuario']);
        }else{
            header("Location: clientesRegistroView.php");
        }
    }

    if(isset($_POST['actualizar'])){
        if(strlen($_POST['idUsuario']) >= 1 && strlen($_POST['usuario']) >= 1 && strlen($_POST['apellidos']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['telefono']) >= 1 && 
        strlen($_POST['contactoEmergencia']) >= 1 && strlen($_POST['direccion']) >= 1 && strlen($_POST['contra']) >= 1 && strlen($_POST['pregunta']) >= 1 &&
        strlen($_POST['fechaCreado']) >= 1  && strlen($_POST['tipoUsuario']) >= 1){
            $control->actualizarCliente($_POST['idUsuario'],mb_strtoupper($_POST['usuario'],'utf-8'),mb_strtoupper($_POST['apellidos'],'utf-8'),$_POST['correo'],$_POST['telefono'],$_POST['contactoEmergencia'],$_POST['direccion'],$_POST['contra'],mb_strtoupper($_POST['pregunta'],'utf-8'),$_POST['fechaCreado'],$_POST['tipoUsuario']);
        }else{
            header("Location: clientesRegistroView.php"); 
            echo '<p>NO registrado con éxito. Error: ';
        }
    }
    
    if(isset($_POST['eliminar'])){

        if(strlen($_POST['idUsuario']) >= 1){

            $idUsuario = $_POST['idUsuario'];

            $control->eliminarCliente($idUsuario);

        }else{

            header("Location: clientesRegistroView.php");

            echo '<p>NO registrado con éxito. Error: '.mysqli_error($conexion);

        }

    }
?>