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
	<title>Crear cita</title>
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
              <div class="col">
              <div class="card p-3 mb-2">
                <div class="card-body">

                  <h5 class="card-title">Formulario de registro para crear cita:</h5>

                  <form  method="post" action="enviarEnfermedad.php">

                  <div class="row g-2">
                      <div class="col-md-6">
                          <label for="inputName" class="col-form-label">Fecha:</label>
                          <input class="form-control" type="date" name="fecha" value="fecha" required>
                      </div>
                      <div class="col-md-6">
                          <label for="inputApellido" class="col-form-label">Hora:</label>
                          <input class="form-control" name="hora" type="time" required>
                      </div>
                  </div>
                  
                  <div class="col">
                    <label for="inputUsername" class="col-form-label">Enfermedad:</label>
                    <input class="form-control" type="text" name="enfermedad"  placeholder="Especifica tu enfermedad" required>
                  </div>

                  <div class="row g-2">
                      <div class="col-md-6">
                        <label for="inputName" class="col-form-label">Sucursal:</label>
                        <select class="form-control" name="sucursal">
                        <option value="0">Seleccione Sucursal:</option>
                          <?php 
                          include 'conexion.php';
                          $re=$mysql->query("select idsucursal, direccion from sucursal")or die($mysql-> error);
                          while ($f=$re->fetch_array()) {
                              echo '<option value="'.$f['idsucursal'].'">'.$f['direccion'].'</option>';
                          }
                          $re->free(); //impia el resultado
                          $mysql->close(); //cierra la coneccion
                          ?>           
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="inputName" class="col-form-label">Médico:</label>
                        <select class="form-control" name="medico">
                          <option value="0">Seleccione Medico:</option>
                          <?php 
                          include 'conexion.php';
                          $re=$mysql->query("select idmedico, nombre from medico")or die($mysql-> error);
                          while ($f=$re->fetch_array()) {
                              echo '<option value="'.$f['idmedico'].'">'.$f['nombre'].'</option>';
                          }
                          $re->free(); //impia el resultado
                          $mysql->close(); //cierra la conexion
                          ?>           
                        </select>
                      </div>
                  </div>

                  <div class="d-md-block text-center mt-3">
                    <button class="btn btn-primary w-50" type="submit" name="aceptar" value="aceptar">Guardar</button>
                  </div>

                  
                  <button style="display:none;" name="aceptar1" value="aceptar1" style="margin-left: 10px"><a href="./sintomas.php">No encuentro mi enfermedad</a></button>		
                  
                </form>
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