<?php
session_start();
//error_reporting(0);
if (!isset($_SESSION['NSS'])) {
    header("location:login.php");
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Mi Información</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="./css/main.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/notifications.js"></script>

  <script>
        window.onload = function() {
            load_notifications();
        }
    </script>
</head>
<body >

<nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
      <img src="imagenes/logoH.png" alt="" width="100px" class="d-inline-block align-text-top rounded-pill">
     <h1  class="navbar-brand"> Hospitales Parque </h1>
  </div>
</nav>

<div class="container">

        <div class="row pt-3">
            
            <div class="col-lg-3">
            <div id="notifications"></div>
            </div>

         
            <div class="col-lg-6 contenedor">
          
            <div class="row mb-3">
                <div class="col">
                    <ul class="nav nav-justified">
                        <li class="nav-item">
                            <a class="nav-link" href="cita.php"><i class="bi bi-plus-circle"></i> Nueva cita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="miInformacion.php"><i class="bi bi-person-circle"></i> Mis datos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil.php"><i class="bi bi-card-checklist"></i> Mis citas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login/cerrar.php"><i class="bi bi-box-arrow-left"></i> Cerrar sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
              
            <div class="row">
              <div class="">
                <div class="card p-3 mb-2">
                  <div class="card-body">
                    <?php

                    include 'conexion.php';

                    if(isset($_SESSION['NSS'])){
                    $arreglo = $_SESSION['NSS'];
                    $re=$mysql->query("SELECT * FROM usuario where idusuario=".$_SESSION['idusuario']." ")or die($mysql-> error);
                    ?><div>
                    <?php
                    if ($re->num_rows > 0) {
                      $f = $re->fetch_assoc();
                    ?>
                    <h5 class="card-title">Selecciona la enfermedad que presentas:</h5>
                    <span><?php echo "Nombre: ". $f['nombre'];?></span><br>
                    <span><?php echo "Apellido Paterno: ". $f['apellidoPaterno'];?></span><br>
                    <span><?php echo "Apellido Materno: ".$f['apellidoMaterno'];?></span><br>
                    <span><?php echo "Domicilio: ". $f['domicilio'];?></span><br>
                    <span><?php echo "Ciudad: ". $f['ciudad'];?></span><br>
                    <span><?php echo "Estado: ".$f['estado'];?></span><br>
                    <span><?php echo "Número de Seguro: ". $f['NSS'];?></span><br>
                    <span><?php echo "E-mail: ". $f['correo'];?></span><br>
                    <?php
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3"></div>

        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>