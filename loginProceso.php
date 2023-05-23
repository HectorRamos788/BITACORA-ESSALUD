<?php 
	session_start();
	include_once 'conexionlogin.php';
	$usuario = $_POST['codigo'];
	$contrasena = $_POST['password'];
	$sentencia = $bd->prepare('select * from usuario where 
								codigo = ? and contrasena = ?;');
	$sentencia->execute([$usuario, $contrasena]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	//print_r($datos);

	if ($datos === FALSE) {
		include("login.php");
		?>
		<P></P>
<h4 color="red" style="text-align:center;">DATOS DE USUARIO INCORRECTO</h4>
		<?php

	}elseif($sentencia->rowCount() == 1){
		$_SESSION['nombre'] = $datos->nombre;
		header('Location: formulario.php');
	}
	


?>