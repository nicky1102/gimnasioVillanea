<!DOCTYPE html>
<html lang="en">
<style>
	/*login*/
	body {
		background: #FEFEFE;
		margin: 15px;
		margin-top: 50px;
		align-items: center;
		font-family: 'Poppins', sans-serif;
	}

	.center {
		margin: auto;
		width: 50%;
		padding: 10px;
		text-align: center;
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
		background: #EDA65A;
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

	.form-label2 {
		padding-top: 100px;
		font-size: 25px;
	}

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

	.btn {

		padding: 7px;
		font-weight: bold;
		background: #D97917;
		width: 90%;
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

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/login.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<title>Inicio</title>
	<!--Código JS-->
	<script>
		function mostrarOlvidoContra() {
			document.getElementById('containerOlvidoContra').style.display = 'block';
			document.getElementById('containerLogin').style.display = 'none';
		}

		function mostrarLogin() {
			document.getElementById('containerLogin').style.display = 'block';
			document.getElementById('containerOlvidoContra').style.display = 'none';
		}
	</script>
</head>

<body>

	<!--LOGIN-->
	<div id="containerLogin">
		<div class="center">
			<form class="login-form" action="respLogin.php" method="POST">
				<!--IMG LOGO-->
				<div class="login-form__logo-container">
					<img class="login-form__logo" src="gym.png" alt="gym">
				</div>
				<!--INPUT INFO-->
				<br>
				<label class="form-label">Login</label><br><br>
				<label class="form-label2">Ingrese su usuario</label><br><br>
				<input style="resize: none" class="form-control" type="text" id="usuario" name="usuario" placeholder="Usuario" required><br><br>

				<label class="form-label2">Ingrese su contrasena</label><br><br>
				<input style="resize: none" type="password" class="form-control" name="contra" placeholder="Contrasena" name="pass" required /><br><br>

				<input type="submit" class="btn" id="signIn" name="signIn" value="Ingresar"></input><br><br>
				<label class="pass" id="btnOlvidoContra" onclick="mostrarOlvidoContra();">¿Olvidó su Contraseña?</label><br><br>
			</form>
		</div>
	</div>



	<!--OLVIDÓ SU CONTRASEÑA-->
	<div id="containerOlvidoContra" style="display:none">
		<div id="containerLogin">
			<div class="center">
				<form class="login-form" action="respLogin.php" method="POST">
					<!--IMG LOGO-->
					<div class="login-form__logo-container">
						<img class="login-form__logo" src="gym.png" alt="gym">
					</div>

					<br><label class="form-label">Recupere su Contraseña</label><br><br>

					<label class="form-label2">Ingrese su usuario</label><br><br>
					<input style="resize: none" class="form-control" type="text" id="usuario" name="usuario" placeholder="Usuario" required><br><br>

					<label class="form-label2">Ingrese la pregunta secreta</label><br><br>
					<input style="resize: none" class="form-control" type="text" id="preguntaSecreta" name="preguntaSecreta" placeholder="Pregunta Secreta" required><br><br>

					<label class="form-label2">Ingrese su nueva contrasena</label><br><br>
					<input style="resize: none" class="form-control" type="clave" id="clave" name="clave" placeholder="Nueva Contraseña" required><br><br>

					<input class="btn" type="submit" id="cambiar" name="cambiar" value="Cambiar" class="estilo"></input><br><br>
					<button class="btn" id="btnLoggin" onclick="mostrarLogin();">Login</button><br><br>
				</form><br>

			</div>
		</div>
	</div>

	<!--Mensajes que se le muestran al usuario cuando los datos son inválidos-->
	<?php
	if (isset($_GET['flag']) && $_GET['flag'] == 's') {
		echo "<script>alert('Datos Inválidos')</script>";
	}
	if (isset($_GET['b']) && $_GET['b'] == 's') {
		echo "<script>alert('Usuario Bloqueado')</script>";
	}
	if (isset($_GET['e']) && $_GET['e'] == 'a') {
		if ($_GET['i'] == 1) {
			echo "<script>alert('Datos Incorrectos, le quedan " . $_GET['i'] . " intento')</script>";
		} else {
			echo "<script>alert('Datos Incorrectos, le quedan " . $_GET['i'] . " intentos')</script>";
		}
	}
	?>
<br>
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