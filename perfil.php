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
  <meta charset="utf-8" />
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="./css/main.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/notifications.js"></script>
  <script src="js/cancelar_cita.js"></script>

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
            <?php
            include 'conexion.php';
            $re = $mysql->query("select c.idcitas, c.enfermedad, c.fecha, c.hora, c.idUsuario, c.activo, s.direccion, m.nombre, m.especialidad from citas c
                join usuario u on u.idusuario=c.idUsuario
                join medico m on m.idmedico = c.idMedico
                join sucursal s on c.idSucursal= s.idsucursal 
                where activo=1 and u.idusuario=" . $_SESSION['idusuario']." ") or die($mysql->error);
            /*. $_SESSION['idusuario'] . " ") or die($mysql->error);*/
            ?>
          
              <?php
              if ($re->num_rows > 0) {
                while ($f = $re->fetch_assoc()) {
              ?>

                  <div class="col-12 col-lg-6">
                      <div class="card mb-2">
                              <div class="card-body">
                                  <h5 class="card-title">Cita Pendiente</h5>
                                  <p class='card-text'><small class='text-muted'><?php echo "Cita agendada para el dia: <span class='fw-bold'>" . $f['fecha']. "</span><br>"; ?>
                                 <?php echo "A las: <span class='fw-bold'>" . $f['hora']. "</span><br>"; ?>
                                  <?php echo "Por la enfermed de: <span class='fw-bold'>". $f['enfermedad']. "</span><br>"; ?>
                                <?php echo "En el imms con direccion: <span class='fw-bold'>" . $f['direccion']. "</span><br>"; ?>
                                 <?php echo "Con el doctor: <span class='fw-bold'>" . $f['nombre']. "</span>"; ?></small></p>
                                 <button class="w-100 btn btn-sm btn-outline-secondary" id="cancelarCita" onclick="cancelarCita(<?= $f['idcitas'] ?>)">Cancelar cita</button>
                              </div>
                          </a>
                      </div>
                  </div>
                
                <?php


                }
              } else {
                ?>
                <div class='card mb-3'>
                  <div class='card-body'>
                    Aún no ha agendado cita
                  </div>
              </div>
              <?php
              }
              ?>
             </div>

            </div>

            <div class="col-lg-3"></div>

        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
    

</body>

</html>