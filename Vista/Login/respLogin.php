<?php
    session_start();
    include_once("../../config/conexion.php");
    include_once("../../Controlador/clientesController.php");

    $conexion = new Conexion();
    $conexion = $conexion->conexion();
    $control = new ClientesController();

    if(isset($_POST['signIn'])){

        $usuario = mysqli_real_escape_string($conexion,mb_strtoupper($_POST['usuario'])); // para no permitir que entren caracteres especiales y que se convierta en mayúscula lo que se escribió
        $contra =  mysqli_real_escape_string($conexion,$_POST['contra']);

        if (strlen($usuario) > 1 &&  strlen($contra) > 1) {

            $existe = $control->usuarioExiste($usuario);

            if($existe > 0){
                
                $datos = $control->verificarUsuario($usuario);
    
                foreach($datos["usuario"] as $dato){
                    $user = $dato['usuario'];
                    $clave = $dato['contra'];
                    $idUser = $dato['idUsuario'];
                    $intentos = $dato['intentos'];
                    $estado = $dato['estado'];

                    if ($estado == 'A') {
                        if ($user == $usuario && $clave == $contra) {
                            $_SESSION['SECURITY'] = "B135V35160";
                            $_SESSION['idTipoUsuario'] = $dato['idTipoUsuario'];
                            $_SESSION['usuario'] = $user;
                            $_SESSION['idUsuario'] = $idUser;
                            header("Location: ../../../index.php");
                        }else{
                            $intentos--;
                            if($intentos <= 0){
                                $control->actualizarEstado($idUser);
                                header('Location: ../Login/loginView.php?b=s');
                    
                            }else{
                                $control->actualizarIntentos($idUser, $intentos);
                                header("Location: ../Login/loginView.php?e=a&i=".$intentos."");
                                //echo "<script> alert('Datos Incorrectos, le quedan".$intentos."'); window.location= '../../Login/loginView.php' </script>";
                            }
                        }
                    }else{
                        header('Location: ../Login/loginView.php?b=s');
                    }
                }
            }else{
                header('Location: ../Login/loginView.php?flag=s');
            }
        }else {
            echo "queee";
            //header('Location: ../Login/loginView.php');
        }
    }

    //CUANDO SELECCIONA OLVIDÓ SU CONTRASEÑA
    if(isset($_POST['cambiar'])){

        $nuevaContra=  mysqli_real_escape_string($conexion,$_POST['clave']);
        $usuario = mysqli_real_escape_string($conexion,mb_strtoupper($_POST['usuario'])); // para no permitir que entren caracteres especiales y que se convierta en mayúscula lo que se escribió
        $pregunta=  mysqli_real_escape_string($conexion,mb_strtoupper($_POST['preguntaSecreta']));
        $existe = $control->usuarioExisteRecuperarContra($usuario,$pregunta);

        echo $existe;
        if($existe > 0){
            $datos = $control->verificarUsuario($usuario); //trayendo id del usuario
            foreach($datos["usuario"] as $dato){
                $idUsuario = $dato['idUsuario'];
            }
            $control->actualizarContra($idUsuario, $nuevaContra);
        }else{
            header('Location: ../Login/loginView.php');
        }
        
    }
?>