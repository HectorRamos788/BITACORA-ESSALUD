<?php
session_start();

require_once "database.php";
date_default_timezone_set('America/Lima');
var_dump($_POST);
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$fecha_actual = date("Y-m-d");
$hora_actual = date("h:i:s");
$cas = $_POST['cas'];
$essi_explota = $_POST['checkbox'][0];
$modulos = $_POST['modulos'];
$detalle = $_POST['detalle'];
$responsable = $_SESSION['nombre'];
$UsuarioR = $_POST['UsuarioR'];
$fechasoporteessi = $_POST['fechasoporteessi'];
$fechasoportemesa = isset($_POST['fechasoportemesa'])?$_POST['fechasoportemesa']:"";
$nroCasoMesa = isset($_POST['nroCasoMesa'])?$_POST['nroCasoMesa']:"";
$fechaTelef = isset($_POST['fechaTelef'])?$_POST['fechaTelef']:"";
$destinoTelef = isset($_POST['destinoTelef'])?$_POST['destinoTelef']:"";
$fechaEmail = isset($_POST['fechaEmail'])?$_POST['fechaEmail']:"";
$destinoEmail = isset($_POST['destinoEmail'])?$_POST['destinoEmail']:"";
$fechaWspp = isset($_POST['fechaWspp'])?$_POST['fechaWspp']:"";
$destinoWspp = isset($_POST['destinoWspp'])?$_POST['destinoWspp']:"";
$fechaFormal = isset($_POST['fechaFormal'])?$_POST['fechaFormal']:"";
$destinoFormal = isset($_POST['destinoFormal'])?$_POST['destinoFormal']:"";

$consulta = $pdo->prepare("INSERT INTO bitacora(Fecha_ocurrencia,Hora_ocurrencia,fecha_registro,hora_registro, CAS,essi_explota,modulo,detalle,responsable,usuario_reporte,fecha_essi_soporte,fecha_mesa_soporte,num_caso_mesa_ayuda,fecha_reporte_telefono,
    destino_reporte_telefono,fecha_reporte_email,destino_reporte_email,fecha_reporte_whatsapp,destino_reporte_whatsapp,fecha_reporte_formal,destino_reporte_formal) 
	VALUES (:fecha,:hora,:fecha_actual,:hora_actual,:cas,:essi_explota,:modulos,:detalle,:responsable,:UsuarioR,:fechasoporteessi,:fechasoportemesa,:nroCasoMesa,:fechaTelef,:destinoTelef,
	:fechaEmail,:destinoEmail,:fechaWspp, :destinoWspp,:fechaFormal,:destinoFormal)");

$consulta->bindParam(':fecha', $fecha);
$consulta->bindParam(':hora', $hora);
$consulta->bindParam(':fecha_actual', $fecha_actual);
$consulta->bindParam(':hora_actual', $hora_actual);
$consulta->bindParam(':cas', $cas);
$consulta->bindParam(':essi_explota', $essi_explota);
$consulta->bindParam(':modulos', $modulos);
$consulta->bindParam(':detalle', $detalle);
$consulta->bindParam(':responsable', $responsable);
$consulta->bindParam(':UsuarioR', $UsuarioR);
$consulta->bindParam(':fechasoporteessi', $fechasoporteessi);
$consulta->bindParam(':fechasoportemesa', $fechasoportemesa);
$consulta->bindParam(':nroCasoMesa', $nroCasoMesa);
$consulta->bindParam(':fechaTelef', $fechaTelef);
$consulta->bindParam(':destinoTelef', $destinoTelef);
$consulta->bindParam(':fechaEmail', $fechaEmail);
$consulta->bindParam(':destinoEmail', $destinoEmail);
$consulta->bindParam(':fechaWspp', $fechaWspp);
$consulta->bindParam(':destinoWspp', $destinoWspp);
$consulta->bindParam(':fechaFormal', $fechaFormal);
$consulta->bindParam(':destinoFormal', $destinoFormal);

if ($consulta->execute()) {

	header("location:index.php");

	echo "Se guardo correctamente";
} else {
	echo "No se guardo";
}