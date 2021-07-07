<?php
session_start();
$idusuario=$_SESSION['idusuario'];
include "./conexion.php";

			$mysql-> query("INSERT INTO `citas`(`enfermedad`, `fecha`, `hora`, `activo`, `idUsuario`, `idMedico`, `idSucursal`)
            VALUES(
				'".$_REQUEST["enfermedad"]."',	
				'".$_REQUEST["fecha"]."',
				'".$_REQUEST["hora"]."',
                '1',
                '".$idusuario."',
                '".$_REQUEST["medico"]."',
                '".$_REQUEST["sucursal"]."'
                )")or die($mysql-> error);
                
	
		header("Location: ./citaRegistrada.php");
	
?>