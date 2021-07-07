<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	 <?php
	  include 'conexion.php';
    session_start();
    /*$mysql-> query("UPDATE productos set nombre='".$_REQUEST["nombre"]."',
    precio='".$_REQUEST["precio"]."',reorden='".$_REQUEST["reorden"]."' 
    where id='".$_REQUEST["id"]."'*/
     $re = $mysql->query("UPDATE citas SET activo =2  WHERE idcitas=".$_REQUEST["idcitas"].) or die($mysql->error);

	  ?>

</body>
</html>