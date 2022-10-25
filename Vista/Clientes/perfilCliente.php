<?php
    include_once("../../config/conexion.php");
    require_once("../../Controlador/clientesController.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>

    <ol>
        <?php
            $control = new ClientesController();
            $datos = $control->mostrarPerfil();

            foreach($datos["datosPerfil"] as $dato){
            echo '<li>'.$dato['idFichaSalud'].'</li>';
            echo '<li>'.$dato['idUsuario'].'</li>';
            echo '<li>'.$dato['usuario'].'</li>';
            echo '<li>'.$dato['tallaPecho'].'</li>';
            }
        ?>
    </ol>
</body>
</html>