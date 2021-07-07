<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css"/>
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/logo.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body class="imgfondo">
<header>
  <div class="overlay">
<h1>Hospitales Parque</h1>
    </div>
    <img src="./imagenes/logoH.png" id="logo">
</header>

	<section>
    <div class="login-page">
        <div class="form">
            <form class="login-form" method="post" action="./login/verificar.php">
			<img src="./imagenes/img_user2.png" alt="Avatar" class="avatar"/>
		<?php 
		if(isset($_GET['error'])){
			echo '<center>Datos No Validos</center>';
		}
		?>
		
		<input type="text" id="NSS" name="NSS" placeholder="Número de Seguro Social" ><br>
        <input type="password" id="Password" name="Password" placeholder="Password" ><br><br>
        <button type="submit" name="aceptar" value="aceptar">Iniciar Sesion</button>
            <p>¿Aun no tienes cuenta? <a href="./formulariou.php">Registrate</a> </p>
		</form>
	</section>