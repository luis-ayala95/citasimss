<?php
session_start();
include "./conexion.php";

			$mysql-> query("INSERT INTO usuario (nombre, apellidoMaterno, apellidoPaterno,
             domicilio, ciudad, estado, NSS, correo, password) VALUES(
				'".$_REQUEST["Nombre"]."',	
				'".$_REQUEST["ApellidoMaterno"]."',
				'".$_REQUEST["ApellidoPaterno"]."',
                '".$_REQUEST["Domicilio"]."',
                '".$_REQUEST["Ciudad"]."',
                '".$_REQUEST["Estado"]."',
                '".$_REQUEST["NSS"]."',
                '".$_REQUEST["Correo"]."',
                '".$_REQUEST["Password"]."'
                )")or die($mysql-> error);
                
	
		header("Location: ./login.php");
	
?>