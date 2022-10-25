<?php
session_start();
if (!isset($_SESSION['SECURITY']) && $_SESSION['SECURITY'] !== "B135V35160") {
    header("Location: ../Login/loginView.php");
    exit;
}

include_once("../../config/conexion.php");
require_once("../../Controlador/clientesController.php");

$control = new ClientesController();
$datos = $control->mostrarPerfil($_SESSION['idUsuario']);
?>
<!DOCTYPE html>
<style>
    /*GLOBAL*/
    body {
        background: #FEFEFE;
        align-items: center;
        font-family: 'Poppins', sans-serif;
    }

    .center {
        margin: auto;
        width: 60%;
        padding: 0px;
        text-align: center;
    }

    /* HEADER */
    .gHeader {
        margin: 0 auto;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    .header {
        min-height: 10vh;
        width: 100%;
        background: #FEFEFE;
        color: #000000;
        position: relative;
    }

    nav {
        display: flex;
        justify-content: space-between;
        align-items: left;
        position: relative;
        z-index: 1;
    }

    .logo {
        text-decoration: none;
        color: #000000;
        font-size: 30px;
        font-weight: bold;
        padding-top: 10px;
        padding-left: 10%;
    }

    .left {
        text-decoration: none;
        color: #000000;
        font-size: 30px;
        font-weight: bold;
        padding-top: 10%;
        padding-left: 10px;
    }

    .nav-links {
        background: #DC7A18;
        padding-left: 3%;
        border-bottom-left-radius: 18px;
    }

    .nav-links ul a {
        font-size: 30px;
        padding-top: 10px;
        padding-right: 100px;
        height: 6px;
    }

    .left-sidebar {
        width: 25%;
        height: 80%;
        position: absolute;
        left: 0;
        top: 0;
        background: #DC7A18;
        border-bottom-right-radius: 18px;
    }

    .row {
        padding: 0 10%;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        position: relative;
        margin-top: 5%;
    }

    .left-col {
        flex-basis: 40%;
    }

    .right-col {
        flex-basis: 55%;
    }

    /* PERFIL */
    .form-control {
        width: 90%;
        padding: 12px 20px;
        margin: 0px auto;
        display: center;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #F1B87E;
    }

    .login-form,
    .login-form * {
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .login-form {
        max-width: 400px;
        margin: 0 auto;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
        background: #EBEBEA;
    }

    .login-form__logo-container {
        padding: 30px;
        background: #EB9947;
    }

    .login-form__logo {
        display: block;
        max-width: 125px;
        margin: 0 auto;
    }

    .form-label {
        padding-top: 240px;
        font-weight: bold;
        font-size: 25px;
    }

    .form-label3 {
        padding-top: 10px;
        font-size: 20px;
    }

    .form-control {
        width: 40%;
        padding: 12px 20px;
        margin: 0px auto;
        display: center;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    /*------Footer-------*/
    .con {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 1170px;
        margin: auto;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }


    ul {
        list-style: none;
    }

    .footer {
        background-color: black;
        padding: 10px 0;
    }

    .footer-col {
        width: 25%;
        padding: 0 10px;
    }

    .footer-col h4 {
        font-size: 18px;
        color: #ffffff;
        text-transform: capitalize;
        margin-bottom: 35px;
        font-weight: 500;
        position: relative;
    }

    .footer-col h4::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: -10px;
        background-color: #DC7A18;
        height: 2px;
        box-sizing: border-box;
        width: 50px;
    }

    .footer-col ul li:not(:last-child) {
        margin-bottom: 10px;
    }

    .footer-col ul li a {
        font-size: 16px;
        text-transform: capitalize;
        color: #ffffff;
        text-decoration: none;
        font-weight: 300;
        color: #bbbbbb;
        display: block;
        transition: all 0.3s ease;
    }

    .footer-col ul li a:hover {
        color: #DC7A18;
        padding-left: 8px;
    }

    .footer-col .social-links a {
        display: inline-block;
        height: 40px;
        width: 40px;
        background-color: rgba(255, 255, 255, 0.2);
        margin: 0 10px 10px 0;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        color: #ffffff;
        transition: all 0.5s ease;
    }

    .footer-col .social-links a:hover {
        color: #24262b;
        background-color: #DC7A18;
    }

    .copyright {
        text-align: center;
    }

    /*responsive*/

    @media(max-width: 767px) {
        .nav {
            width: 50%;
            margin-bottom: 30px;
        }
    }

    @media(max-width: 574px) {
        .nav {
            width: 100%;
        }
    }

    @media(max-width: 767px) {
        .navbar {
            width: 50%;
            margin-bottom: 30px;
        }
    }

    @media(max-width: 574px) {
        .navbar {
            width: 100%;
        }
    }

    @media(max-width: 767px) {
        .left-sidebar {
            width: 50%;
            margin-bottom: 30px;
        }
    }

    @media(max-width: 574px) {
        .left-sidebar {
            width: 100%;
        }
    }

    @media(max-width: 767px) {
        .logo {
            width: 50%;
            margin-bottom: 30px;
        }
    }

    @media(max-width: 574px) {
        .logo {
            width: 100%;
        }
    }

    @media(max-width: 767px) {
        .footer-col {
            width: 50%;
            margin-bottom: 30px;
        }
    }

    @media(max-width: 574px) {
        .footer-col {
            width: 100%;
        }
    }
</style>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Perfil</title>
</head>

<body>
    <header>
        <!--HEADER-->
        <div id="wrapper">
            <div class="header">
                <div class="navbar">
                    <nav>
                        <a class="logo">Gimnasio Villanea</a><br><br>
                        <div class="nav-links">
                            <ul id="MenuItems">
                                <ul>
                                    <a class="left" href="../../index.php">Inicio</a>
                                </ul>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="left-sidebar">
                    <div class="row">
                        <div class="left-col">

                        </div>
                        <div class="right-col">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--PERFIL-->
    <div class="center">
        <form class="login-form" action="respLogin.php" method="POST">
            <div class="login-form">
                <div class="login-form__logo-container">
                    <img class="login-form__logo" src="add.png" alt="gym">
                </div>

                <?php
                foreach ($datos["datosPerfil"] as $dato) {
                    echo '<br>';

                    echo '<label class="form-label3" for="usuario">Usuario</label><br>';
                    echo '<input class="form-control" type="text" id="Usuario" name="Usuario" placeholder="' . $dato['usuario'] . '" required><br><br>';

                    echo '<label class="form-label3" for="telefono">Telefono</label><br>';
                    echo '<input class="form-control" type="text" id="telefono" name="telefono" placeholder="' . $dato['telefono'] . '" required><br><br>';

                    echo '<label class="form-label3" for="contactoEmergencia">Contacto de Emergencia</label><br>';
                    echo '<input class="form-control" type="text" id="telefono" name="contactoEmergencia" placeholder="' . $dato['contactoEmergencia'] . '" required><br><br>';

                    echo '<label class="form-label3" for="correo">Correo</label><br>';
                    echo '<input class="form-control" type="text" id="correo" name="correo" placeholder="' . $dato['correo'] . '" required><br><br>';

                    echo '';
                }
                ?>
            </div>
        </form>
        <br><br><label class="form-label3" for="act">PARA ACTUALIZAR SU PERFIL CONTACTE AL ADMINISTRADOR!</label><br><br>
    </div>

    <!--Footer-->
    <div class="con">
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <h4>Compañía</h4>
                        <ul>
                            <li><a href="#">Sobre nosotros</a></li>
                            <li><a href="#">Nuestros servicios</a></li>
                            <li><a href="#">Política privada</a></li>
                            <br>
                            <br>
                            <br>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Ayuda</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="Vista/Clientes/clientesRegistroView.php">Reservaciones</a></li>
                            <li><a href="#">Opciones de pago</a></li>
                            <br>
                            <br>
                            <li><a class="copyright" href="">&#169; 2022 Ark Code</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Síguenos</h4>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>

                </div>

            </div>
        </footer>
    </div>
</body>

</html>