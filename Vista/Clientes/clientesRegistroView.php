<?php
session_start();
if (!isset($_SESSION['SECURITY']) && $_SESSION['SECURITY'] !== "B135V35160") {
    header("Location: ../Login/loginView.php");
    exit;
}
include_once("../../config/conexion.php");
require_once("../../Controlador/clientesController.php");

$control = new ClientesController();
$datos = $control->mostrarClientes();
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
    <link rel="stylesheet" href="css/registro.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Registro Clientes | GV</title>
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
        function editar(idUsuario, usuario, apellidos, correo, telefono, contactoEmergencia, direccion, contra, pregunta, fechaCreado, idTipoUsuario) {
            document.getElementById("idUsuario").value = idUsuario;
            document.getElementById("usuario").value = usuario;
            document.getElementById("apellidos").value = apellidos;
            document.getElementById("correo").value = correo;
            document.getElementById("telefono").value = telefono;
            document.getElementById("contactoEmergencia").value = contactoEmergencia;
            document.getElementById("direccion").value = direccion;
            document.getElementById("contra").value = contra;
            document.getElementById("pregunta").value = pregunta;
            document.getElementById("fechaCreado").value = fechaCreado;
            document.getElementById("idTipoUsuario").value = idTipoUsuario;
        }

        function eliminar(idUsuario, usuario, apellidos, correo, telefono, contactoEmergencia, direccion, contra, pregunta, fechaCreado, idTipoUsuario) {

            document.getElementById("idUsuario").value = idUsuario;

            document.getElementById("usuario").value = usuario;

            document.getElementById("apellidos").value = apellidos;

            document.getElementById("correo").value = correo;

            document.getElementById("telefono").value = telefono;

            document.getElementById("contactoEmergencia").value = contactoEmergencia;

            document.getElementById("direccion").value = direccion;

            document.getElementById("contra").value = contra;

            document.getElementById("pregunta").value = pregunta;

            document.getElementById("fechaCreado").value = fechaCreado;

            document.getElementById("idTipoUsuario").value = idTipoUsuario;

        }
    </script>

    <!--REGISTRO DEL CLIENTE-->
    <div class="center">
        <form action="respuestaClientes.php" method="POST">

            <br><label class="form-label" for="direccion">Ingrese los datos del cliente</label><br><br>

            <input type="hidden" id="idUsuario" name="idUsuario" required>

            <label class="form-label3" for="direccion">Usuario</label><br><br>
            <input class="form-control" type="text" id="usuario" name="usuario" placeholder="Usuario" required><br><br>

            <label class="form-label3" for="direccion">Apellidos</label><br><br>
            <input class="form-control" type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required><br><br>


            <label class="form-label3" for="direccion">Correo</label><br><br>
            <input class="form-control" type="correo" id="correo" name="correo" placeholder="Correo" required><br><br>

            <label class="form-label3" for="direccion">Telefono</label><br><br>
            <input class="form-control" type="text" id="telefono" name="telefono" placeholder="Teléfono" required><br><br>


            <label class="form-label3" for="direccion">Contacto de Emergencia</label><br><br>
            <input class="form-control" type="text" id="contactoEmergencia" name="contactoEmergencia" placeholder="Contacto Emergencia" required><br><br>

            <label class="form-label3" for="direccion">Dirección</label><br><br>
            <textarea id="direccion" class="form-control" name="direccion" rows="5" cols="20" maxlength="150" required></textarea><br><br>

            <label class="form-label3" for="contra">Contraseña</label><br><br>
            <input class="form-control" type="password" id="contra" name="contra" placeholder="Respuesta" required><br><br>

            <label class="form-label3" for="estado">Pregunta de Seguridad</label><br><br>
            <input class="form-control" type="password" id="pregunta" name="pregunta" placeholder="Respuesta" required><br><br>

            <label class="form-label3" for="estado">Fecha de Creacion</label><br><br>
            <input class="form-control" type="date" id="fechaCreado" name="fechaCreado" required><br><br>

            <label class="form-label3" for="estado">Tipo de Usuario</label><br><br>
            <select class="form-control" id="tipoUsuario" name="tipoUsuario" required><br><br>
                <option class="form-label3">Tipo de Usuario</option>
                <option class="form-label3" value="1">Administrador</option>
                <option class="form-label3" value="2">Cliente</option>
            </select><br><br>

            <button class="btn" id="registrar" type="submit" name="registrar">Registrar</button>
            <button class="btn" id="actualizar" type="submit" name="actualizar">Actualizar</button>
            <button class="btn" id="eliminar" type="submit" name="eliminar">Eliminar</button><br><br>
        </form>
    </div>

    <!--CLIENTES REGISTRADOS-->
    <div class="center">
        <table>
            <thead>
                <tr>
                    <br>
                    <th colspan="2">Usuario</th>
                    <th colspan="2">Apellidos</th>
                    <th colspan="2">Correo</th>
                    <th colspan="2">Teléfono</th>
                    <th colspan="2">Contacto Emergencia</th>
                    <th colspan="2">Dirección</th>
                    <th colspan="2">Fecha</th>
                    <th colspan="2">Tipo Usuario</th>
                    <th colspan="2">Editar</th>
                    <th colspan="2">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datos["clientes"] as $dato) {
                    echo '<tr colspan="3">';
                    echo '<td colspan="2">' . $dato['usuario'] . '</td>';
                    echo '<td colspan="2">' . $dato['apellidos'] . '</td>';
                    echo '<td colspan="2">' . $dato['correo'] . '</td>';
                    echo '<td colspan="2">' . $dato['telefono'] . '</td>';
                    echo '<td colspan="2">' . $dato['contactoEmergencia'] . '</td>';
                    echo '<td colspan="2">' . $dato['direccion'] . '</td>';
                    echo '<td colspan="2">' . $dato['fechaCreado'] . '</td>';
                    if ($dato['idTipoUsuario'] == 1) {
                        echo '<td colspan="2">ADMINISTRADOR</td>';
                    } else {
                        echo '<td colspan="2">CLIENTE</td>';
                    }
                    echo '<td colspan="2"><input type="button" name="editar" class="btnEditar" onclick="editar(\'' . $dato['idUsuario'] . '\',\'' . $dato['usuario'] . '\',\'' . $dato['apellidos'] . '\',\'' . $dato['correo'] . '\',\'' . $dato['telefono'] . '\',\'' . $dato['contactoEmergencia'] . '\',\'' . $dato['direccion'] . '\',\'' . $dato['contra'] . '\',\'' . $dato['pregunta'] . '\',\'' . $dato['fechaCreado'] . '\',\'' . $dato['idTipoUsuario'] . '\');"></td>';
                    echo '<td><input type="button" name="eliminar" class="btnEliminar" onclick="eliminar(\'' . $dato['idUsuario'] . '\',\'' . $dato['usuario'] . '\',\'' . $dato['apellidos'] . '\',\'' . $dato['correo'] . '\',\'' . $dato['telefono'] . '\',\'' . $dato['contactoEmergencia'] . '\',\'' . $dato['direccion'] . '\',\'' . $dato['contra'] . '\',\'' . $dato['pregunta'] . '\',\'' . $dato['fechaCreado'] . '\',\'' . $dato['estado'] . '\',\'' . $dato['idTipoUsuario'] . '\');"></td>';
                    echo '<tr colspan="3">';
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