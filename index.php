<?php
session_start();
if (!isset($_SESSION['SECURITY']) && $_SESSION['SECURITY'] !== "B135V35160") {
    header("Location: Vista/Login/loginView.php");
    exit;
}
?>
<!DOCTYPE html>
<style>
    * {
        font-family: 'Poppins';
    }

    .container {
        width: 100%;
        min-height: 69.4vh;
        padding-left: 8%;
        padding-right: 8%;
        box-sizing: border-box;
        overflow: hidden;
    }

    .con1 {
        width: 100%;
        min-height: 50vh;
        padding-left: 2%;
        padding-right: 2%;
        box-sizing: border-box;
        overflow: hidden;
    }

    .navbar {
        width: 100%;
        display: flex;
        align-items: center;
    }


    .logo {
        width: 60px;
        cursor: pointer;
        margin: 30px 0;
    }

    .menu-icon {
        width: 25px;
        cursor: pointer;
        display: none;
    }

    nav ul li {
        list-style: none;
        display: inline-block;
        margin-right: 30px;
    }

    nav ul li a {
        text-decoration: none;
        color: #000;
        font-size: 14px;
    }

    nav ul li a:hover {
        color: #DC7A18;
    }

    .row {
        justify-content: space-between;
        align-items: center;
        margin: 0px;
        white-space: nowrap
    }

    /* LEFT */
    .col-1 {
        flex-basis: 40%;
        position: relative;
        margin-left: 100px;
        padding: 0 25px;
        padding-top: 5%;
    }

    .col-1 h2 {
        color: #A55C12;
        text-shadow: 3px 3px #BAB8B5;
        font-size: 45px;
    }

    .col-1 h3 {
        font-size: 30px;
        color: #81470E;
        font-weight: 100;
        margin: 20px 0 10px;
    }

    .col-1 p {
        font-size: 16px;
        color: black;
        font-weight: 100;
    }

    .col-1::after {
        content: '';
        width: 10px;
        height: 100%;
        background: linear-gradient(#E78523, #F3C291);
        position: absolute;
        left: -40px;
        top: 8px;
    }

    /* RIGHT */

    .col-2 {
        position: relative;
        flex-basis: 100%;
        display: flex;
        align-items: center;
        width: 100%;
    }

    .col-2 .controller {
        width: 100%;
        padding-top: 40px;
    }

    .color-box {
        position: absolute;
        right: 0;
        top: 0;
        background: linear-gradient(#E78523, #F3C291);
        border-radius: 20px 0 0 20px;
        height: 200%;
        width: 120%;
        z-index: -1;
        transform: translateX(100px);
    }

    /* SOCIAL MEDIA */

    .social-links {
        height: 13px;
        margin: 25px;
        cursor: pointer;
        text-align: center;
        padding-right: 10%;
    }

    /*------Footer-------*/
    .con {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container1 {
        max-width: 1170px;
        margin: auto;
    }

    .row1 {
        display: flex;
        flex-wrap: wrap;
    }


    ul {
        list-style: none;
    }

    .footer {
        background-color: black;
        padding: 25px 0;
        bottom: 0;
        height: auto;
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

    @media only screen and (max-width:700px) {
        nav ul {
            width: 100%;
            background: linear-gradient(#E78523, #F3C291);
            position: absolute;
            top: 75px;
            right: 0;
            z-index: 2;
        }

        nav ul li {
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        nav ul li a {
            color: black;
        }

        .menu-icon {
            display: block;
        }

        #menuList {
            overflow: hidden;
            transition: 0.5s;
        }

        .row {
            flex-direction: column-reverse;
            margin: 50px 0;
        }

        .col-2 {
            flex-basis: 100%;
            margin-bottom: 50px;
        }

        .col-2 .controller {
            transform: translateX(75px);
        }

        .col-1 {
            flex-basis: 100%;
        }

        .col-1 h2 {
            font-size: 20px;
        }

        .col-1 h3 {
            font-size: 15px;
        }

        @media(max-width: 767px) {
            .footer-col {
                width: 25%;
                margin-bottom: 30px;
            }
        }

        @media(max-width: 574px) {
            .footer-col {
                width: 100%;
            }
        }
    }
</style>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Gimnasio Villanea</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <img src="gym.png" class="logo" alt="">
            <nav>
                <ul id="menuList">
                    <?php
                    if ($_SESSION['idTipoUsuario'] == 1) { //Solo el admin ve estas opciones
                        echo "<li><a href='Vista/Clientes/clientesRegistroView.php'>Registro Clientes</a></li>";
                        echo "<li><a href='Vista/FichaSalud/fichaSaludRegistroView.php'>Ficha Salud</a></li>";
                        echo "<li><a href='Vista/Historico/historicoView.php'>Histórico Salud</a></li>";
                        echo "<li><a href='Vista/Horarios/CrearHorariosView.php'>Crear Horarios</a></li>";
                        echo '<li><a href="Vista/Login/loginView.php">Salir</a></li>';
                    }
                    if ($_SESSION['idTipoUsuario'] == 2) { //Solo el cliente ve estas opciones
                        echo "<li><a href='Vista/Clientes/perfilClienteView.php'>Perfil</a></li>";
                        echo "<li><a href='Vista/Horarios/AgendarView.php'>Agendar Cita</a></li>";
                        echo '<li><a href="Vista/Login/loginView.php">Salir</a></li>';
                    }
                    ?>
                </ul>
            </nav>
            <img src="menu.png" class="menu-icon" onclick="togglemenu()">
        </div>
        <div class="con1">
            <div class="row" style="margin: auto">
                <div class="col-1">
                    <h2>¡Qué bien tenerte de vuelta, <?php echo $_SESSION['usuario'] ?>!</h2>
                    <h3> ¿Preparad@ para encargarse de su salud?</h3>
                    <br>
                    <p>Búscanos en nuestras redes sociales.</p>
                    <div class="social-links">

                        <a><i class="fab fa-facebook-f"></i></a>
                        <a><i class="fab fa-instagram"></i></a>
                        <a><i class="fab fa-whatsapp"></i></a>
                        <a><i class="fab fa-waze"></i></a>

                    </div>
                </div>
                <div class="col-2">
                    <img src="weights.png" class="controller" alt="">
                    <div class="color-box"></div>
                </div>
            </div>


        </div>

    </div>

    <script>
        var menuList = document.getElementById("menuList");

        menuList.style.maxHeight = "0px";

        function togglemenu() {
            if (menuList.style.maxHeight == "0px") {

                menuList.style.maxHeight = "130px";
            } else {

                menuList.style.maxHeight = "0px";
            }
        }
    </script>

    <!--Footer-->

    <footer class="footer">
        <div class="container1">
            <div class="con">
                <div class="row1">
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
                        <h4>Contáctenos</h4>
                        <ul>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-telegram"></i></a>
                                <a href="#"><i class="fab fa-whatsapp"></i></a>
                            </div>
                            <br>
                            <br>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Síguenos</h4>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

    </footer>
</body>

</html>