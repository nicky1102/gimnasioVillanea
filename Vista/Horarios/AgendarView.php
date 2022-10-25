<?php
include_once("../../config/conexion.php");
require_once("../../Controlador/CrearHorariosController.php");
$controlCliente = new CrearHorariosController();
$datosCliente = $controlCliente->mostrarIdHorario();

require_once("../../Controlador/AgendarController.php");
$control = new AgendarController();
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
        padding: 10px;
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

    /* REGISTRO */
    .login-form,
    .login-form * {
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
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

    .form-control:focus {
        border-color: #F1B87E;
    }

    .btn {
        display: inline-block;
        padding: 7px;
        font-weight: bold;
        background: #D97917;
        width: 17%;
        border: none;
        outline: none;
        border-radius: 5px;
        cursor: pointer;

    }

    .btn:hover {
        background: #F1B87E;
    }

    .pass {
        display: inline-block;
        color: #D97917;
        text-decoration: underline;
    }

    .pass:hover {
        background: #F1B87E;
    }

    .link {
        padding: 8px 30px;
        margin: 30px 0;
        color: #000000;
    }

    .con1 {
        margin: auto;
        padding-top: 0.1px;
        width: 25%;
    }

    .con2 {
        margin: auto;
        padding-top: 0.1px;
        padding-left: 0.5px;
        width: 25%;
    }

    /* TABLE */
    td,
    th {
        border: 1px solid #999;
        padding: 0.5rem;
        text-align: center;
    }

    th {
        background: #F1B87E;
        border-color: white;
    }

    td {
        border-color: white;
    }

    td:nth-child(2) {
        background: white;
    }

    table {
        border-collapse: collapse;
    }

    .btnT {
        padding: 7px;
        font-weight: bold;
        background: #D97917;
        width: 20%;
        border: none;
        outline: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background: #F1B87E;
    }

    .btnEditar {
        background-image: url(https://cdn.iconscout.com/icon/free/png-256/edit-2653317-2202989.png);
        background-size: cover;
        width: 30px;
        height: 30px;
        font-size: 2rem;
    }

    .btnEliminar {
        background-image: url(https://toppng.com/uploads/preview/big-trash-can-vector-trash-can-icon-1156305906701r6eta2fm.png);
        background-size: cover;
        width: 30px;
        height: 30px;
        font-size: 2rem;
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
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Agendar | GV</title>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script>
        $(document).ready(function() {
            $("#buscar").click(function() {
                $("#historial").html("<img src='loading-buffering.gif' width='100px'>").load("respHistorico.php?idUsuario=" + $("#idUsuario").val());
            });
        });
    </script>
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

    <!--BODY-->

    <div class="center">
        <form action="respuestaAgendar.php" method="POST">
            <label class="form-label3" for="agenda">Agenda</label><br><br>

            <label class="form-label3" for="estado">Seleccione un horario</label><br><br>
            <select class="form-control" id="sesion" name="sesion">
                <option class="form-label3"> Agendar día y hora:</option>
                <?php
                foreach ($datosCliente["datosHorario"] as $dato) {
                    echo '<option class="form-label3" value="' . $dato['idHorarios'] . '">' . $dato['fecha'] . ' ' . $dato['horaInicio'] . ' ' . $dato['horaFin'] . '</option>';
                }
                ?>
            </select>

            <br><br>
            <option class="form-label3">Seleccione un método de pago</option>
            <select class="form-control" id="metodo" name="metodo" required>
            <option class="form-label3">Método de Pago</option>   
            <option class="form-label3">Tarjeta</option>
                <option class="form-label3">Efectivo</option>
            </select>

            <br><br>

            <button class="btn" id="aceptar" type="submit" name="aceptar">Aceptar</button>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </form>
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
                        <h4>follow us</h4>
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