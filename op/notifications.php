<?php
session_start();

include '../conexion.php';

date_default_timezone_set("America/Mexico_City");
$mifecha = new DateTime(); 
$fecha = $mifecha->format('Y-m-d');
$hora =  $mifecha->format('H:i');
$hora_alert = "00:30:00";

$query = "select SUBTIME(c.hora, '$hora_alert') as hora_alert, c.idcitas, c.enfermedad, c.fecha, c.hora, c.idUsuario, c.activo, s.direccion, m.nombre, m.especialidad from citas c
join usuario u on u.idusuario=c.idUsuario
join medico m on m.idmedico = c.idMedico
join sucursal s on c.idSucursal= s.idsucursal 
where activo=1 and u.idusuario=" . $_SESSION['idusuario']." ";
$result = $mysql->query($query);   

$text='';

    if($result ->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row['fecha']<=$fecha){
                if($hora>=$row['hora_alert'] && $hora<=$row['hora']){
                    $hora_cita  = new DateTime($row['hora']);
                    $hora_actual = new DateTime($hora);
                    $interval= $hora_cita ->diff($hora_actual);
                    $hora_restante = $interval->format('%i');
                    $text.='
                        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false" >
                            <div class="toast-header">
                            <i class="bi bi-bell"></i>
                            <strong class="me-auto">Notificación</strong>
                            <small>Hace 1 segundo</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>

                            <div class="toast-body">
                            Tienes una cita en '.$hora_restante.' minutos
                            </div>
                        </div>
                        ';
                }
            }
        } //fin del while

    $result->free();
    $mysql->close();

    }
    echo $text;
?>