<?php
session_start();

include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $status=0;

        if(!empty($_POST["id_cita"])){
            $id_cita = $mysql->real_escape_string((strip_tags($_POST["id_cita"], ENT_QUOTES)));
        }

            if ($mysql->connect_error){ 
                die("Se perdio la conexion, vuelve a intentarlo");
                                //error
            }else{
                $query = "UPDATE `citas` SET `activo` = '0' WHERE `citas`.`idcitas` = $id_cita;";
                $mysql->query($query)or die ($mysql->error);
                $mysql->close(); //cierra la conexion
                $status = 1;
            }//fin del if verifica la conexion bd
        echo $status;
} //fin if method POST
?>
