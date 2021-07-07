<?php
session_start();
include "../conexion.php";

$re=$mysql->query("select * from usuario where NSS='".$_POST['NSS']."' AND 
 					Password='".$_POST['Password']."'")	or die($mysql-> error);
	
					 while($f = $re->fetch_array()){
						$_SESSION['NSS']=$f['NSS'];
						$_SESSION['idusuario']=$f['idusuario'];
					}
					if (isset($_SESSION['NSS'])) {
						
						header("Location: ../perfil.php");
					} else{
						
						header("Location: ../login.php?error=datosinvalidos");
						
					}
	
?>