<?php
session_start();
if (!isset($_SESSION['SECURITY']) && $_SESSION['SECURITY'] !== "B135V35160") {
    header("Location: ../Login/loginView.php");
    exit;
}

include_once("../../config/conexion.php");
require_once("../../Controlador/FichaSaludController.php");

$control = new FichaSaludController();
$datos = $control->mostrarFichaSalud();

require_once("../../Controlador/clientesController.php");
$controlCliente = new ClientesController();
?>
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Fichas Salud | GV</title>
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

    <script>
        function editar(idFichaSalud, idUsuario, tallaPecho, tallaCintura, tallaCadera, estatura, peso, masaCorporal, masaMuscular, enfermedades, fecha) {
            document.getElementById("idFichaSalud").value = idFichaSalud;
            document.getElementById("idUsuario").value = idUsuario;
            document.getElementById("tallaPecho").value = tallaPecho;
            document.getElementById("tallaCintura").value = tallaCintura;
            document.getElementById("tallaCadera").value = tallaCadera;
            document.getElementById("estatura").value = estatura;
            document.getElementById("peso").value = peso;
            document.getElementById("masaCorporal").value = masaCorporal;
            document.getElementById("masaMuscular").value = masaMuscular;
            document.getElementById("enfermedades").value = enfermedades;
            document.getElementById("fecha").value = fecha;
        }

        function eliminar(idFichaSalud, idUsuario, tallaPecho, tallaCintura, tallaCadera, estatura, peso, masaCorporal, masaMuscular, enfermedades, fecha) {
            document.getElementById("idFichaSalud").value = idFichaSalud;
            document.getElementById("idUsuario").value = idUsuario;
            document.getElementById("tallaPecho").value = tallaPecho;
            document.getElementById("tallaCintura").value = tallaCintura;
            document.getElementById("tallaCadera").value = tallaCadera;
            document.getElementById("estatura").value = estatura;
            document.getElementById("peso").value = peso;
            document.getElementById("masaCorporal").value = masaCorporal;
            document.getElementById("masaMuscular").value = masaMuscular;
            document.getElementById("enfermedades").value = enfermedades;
            document.getElementById("fecha").value = fecha;
        }
    </script>

    <!--REGISTRO DEL CLIENTE FICHA DE SALUD-->
    <div class="center">
        <form action="respuestaFichaSalud.php" method="POST">

            <br><label class="form-label" for="direccion">Ingrese los datos de salud del cliente</label><br><br>

            <label class="form-label3" for="estado">Ficha de Salud</label><br><br>

            <input type="hidden" id="idFichaSalud" name="idFichaSalud">

            <label class="form-label3" for="estado">Usuario</label><br><br>

            <select class="form-control" id="idUsuario" name="idUsuario" required>
                <option class="form-label3" value="0">Usuario</option>
                <?php
                //Se invoca al controller cliente para obtener los datos: idUsuario, usuario, apellidos y así que el administrador pueda seleccionar un cliente
                $datosCliente = $controlCliente->mostrarIdClientes();
                foreach ($datosCliente["datosClientes"] as $dato) {
                    echo '<option class="form-label3" value="' . $dato['idUsuario'] . '">' . $dato['usuario'] . ' ' . $dato['apellidos'] . '</option>';
                }
                ?>
            </select><br><br>
            <label class="form-label3" for="estado">Seleccione una fecha</label><br><br>
            <input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha" required><br><br>

            <label class="form-label3" for="estado"> Talla de pecho</label><br><br>
            <input type="text" id="tallaPecho" name="tallaPecho" class="form-control" placeholder="Talla Pecho" required><br><br>

            <label class="form-label3" for="estado">Talla de cintura</label><br><br>
            <input type="text" id="tallaCintura" name="tallaCintura" class="form-control" placeholder="Talla Cintura" required><br><br>

            <label class="form-label3" for="estado">Talla de cadera</label><br><br>
            <input type="text" id="tallaCadera" name="tallaCadera" class="form-control" placeholder="Talla Cadera" required><br><br>

            <label class="form-label3" for="estado">Estatura</label><br><br>
            <input type="text" id="estatura" name="estatura" class="form-control" placeholder="Estatura" required><br><br>

            <label class="form-label3" for="estado">Peso</label><br><br>
            <input type="text" id="peso" name="peso" class="form-control" placeholder="Peso" required><br><br>

            <label class="form-label3" for="estado">Indice de masa corporal</label><br><br>
            <input type="text" id="masaCorporal" name="masaCorporal" class="form-control" placeholder="Índice Masa Corporal" required><br><br>

            <label class="form-label3" for="estado">Indice de masa muscular</label><br><br>
            <input type="text" id="masaMuscular" name="masaMuscular" class="form-control" class="form-control" placeholder="Índice Masa Muscular" required><br><br>

            <label class="form-label3" for="estado">Enfermedades</label><br><br>
            <textarea id="enfermedades" name="enfermedades" class="form-control" placeholder="Enfermedades" rows="5" cols="20" maxlength="150" required></textarea><br><br>

            <button class="btn" id="registrar" type="submit" name="registrar">Registrar</button>
            <button class="btn" id="actualizar" type="submit" name="actualizar">Actualizar</button>
            <button class="btn" id="eliminar" type="submit" name="eliminar">Eliminar</button>
        </form>
    </div>

    <!--CLIENTES REGISTRADOS-->
    <div class="center">
        <table>
            <thead>
                <tr>
                    <th>Numero de Ficha</th>
                    <th>Id de Usuario</th>
                    <th>Usuario</th>
                    <th>Talla Pecho</th>
                    <th>Talla Cintura</th>
                    <th>Talla Cadera</th>
                    <th>Estatura</th>
                    <th>Peso</th>
                    <th>IMC</th>
                    <th>Índice de Masa Muscular</th>
                    <th>Enfermedades</th>
                    <th>Fecha</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datos["fichas"] as $dato) {
                    echo '<tr>';
                    echo '<td>' . $dato['idFichaSalud'] . '</td>';
                    echo '<td>' . $dato['idUsuario'] . '</td>';
                    echo '<td>' . $dato['usuario'] . '</td>';
                    echo '<td>' . $dato['tallaPecho'] . '</td>';
                    echo '<td>' . $dato['tallaCintura'] . '</td>';
                    echo '<td>' . $dato['tallaCadera'] . '</td>';
                    echo '<td>' . $dato['estatura'] . '</td>';
                    echo '<td>' . $dato['peso'] . '</td>';
                    echo '<td>' . $dato['masaCorporal'] . '</td>';
                    echo '<td>' . $dato['masaMuscular'] . '</td>';
                    echo '<td>' . $dato['enfermedades'] . '</td>';
                    echo '<td>' . $dato['fecha'] . '</td>';
                    echo '<td><input type="button" name="editar" class="btnEditar" onclick="editar(\'' . $dato['idFichaSalud'] . '\',\'' . $dato['idUsuario'] . '\',\'' . $dato['tallaPecho'] . '\',\'' . $dato['tallaCintura'] . '\',\'' . $dato['tallaCadera'] . '\',\'' . $dato['estatura'] . '\',\'' . $dato['peso'] . '\',\'' . $dato['masaCorporal'] . '\',\'' . $dato['masaMuscular'] . '\',\'' . $dato['enfermedades'] . '\',\'' . $dato['fecha'] . '\');"></td>';
                    echo '<td><input type="button" name="eliminar" class="btnEliminar" onclick="eliminar(\'' . $dato['idFichaSalud'] . '\',\'' . $dato['idUsuario'] . '\',\'' . $dato['tallaPecho'] . '\',\'' . $dato['tallaCintura'] . '\',\'' . $dato['tallaCadera'] . '\',\'' . $dato['estatura'] . '\',\'' . $dato['peso'] . '\',\'' . $dato['masaCorporal'] . '\',\'' . $dato['masaMuscular'] . '\',\'' . $dato['enfermedades'] . '\',\'' . $dato['fecha'] . '\');"></td>';
                    echo '<td></td>';
                    echo '<tr>';
                }
                ?>
            </tbody>
        </table>
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
                            <li><a href="#">Reservaciones</a></li>
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