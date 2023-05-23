<?php  
	session_start();
    $bitacora = 0;
	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'database.php';
		$sentencia = $bd->query("SELECT * FROM bitacora;");
		$bitacora = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($alumnos);
	}else{
		echo "Error en el sistema";
	}


	
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Database </title>
</head>
<body>
    <div class="page-header bg-secondary text-white text-center">
        <span class="h2">BITACORA ESSI</span>
     
    </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered border-Secondary">
                    <thead>
                        <tr>
                            <th rowspan="2">ID</th>
                            <th rowspan="2">Fecha de la Ocurrencia</th>
                            <th rowspan="2">Hora de la Ocurrencia</th>
                            <th rowspan="2">Fecha de Registro</th>
                            <th rowspan="2">Hora de Registro</th>
                            <th rowspan="2">Dependencia</th>
                            <th rowspan="2">ESSL/Explota</th>
                            <th rowspan="2">Módulo</th>
                            <th rowspan="2">Detalle del problema</th>
                            <th rowspan="2">Responsable que registra</th>
                            <th rowspan="2">Usuario que reporta</th>
                            <th rowspan="2">Fecha a soporte ESSI</th>
                            <th rowspan="2">Fecha soporte Mesa de Ayuda</th>
                            <th rowspan="2">N° Caso mesdeayuda</th>
                            <th colspan="2">Reporte telefonico a...</th>
                            <th colspan="2">Reporte por Email a:...</th>
                            <th colspan="2">Reporte por Whatsapp a...</th>
                            <th colspan="2">Reporte formal a...</th>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <th>Destino</th>
                            <th>Fecha</th>
                            <th>Destino</th>
                            <th>Fecha</th>
                            <th>Destino</th>
                            <th>Fecha</th>
                            <th>Destino</th>
                        </tr>

                        <?php
                        foreach($bitacora as $dato){
                            ?>
                            <tr>
                                <td><?php echo $dato->idbitacora; ?></td>
                                <td><?php echo $dato->Fecha_ocurrencia; ?></td>
                                <td><?php echo $dato->Hora_ocurrencia; ?></td>
                                <td><?php echo $dato->fecha_registro; ?></td>
                                <td><?php echo $dato->hora_registro; ?></td>
                                <td><?php echo $dato->CAS; ?></td>
                                <td><?php echo $dato->essi_explota; ?></td>
                                <td><?php echo $dato->modulo; ?></td>
                                <td><?php echo $dato->detalle; ?></td>
                                <td><?php echo $dato->responsable; ?></td>
                                <td><?php echo $dato->usuario_reporte; ?></td>
                                <td><?php echo $dato->fecha_essi_soporte; ?></td>
                                <td><?php echo $dato->fecha_mesa_soporte; ?></td>
                                <td><?php echo $dato->num_caso_mesa_ayuda; ?></td>
                                <td><?php echo $dato->fecha_reporte_telefono; ?></td>
                                <td><?php echo $dato->destino_reporte_telefono; ?></td>
                                <td><?php echo $dato->fecha_reporte_email; ?></td>
                                <td><?php echo $dato->destino_reporte_email; ?></td>
                                <td><?php echo $dato->fecha_reporte_whatsapp; ?></td>
                                <td><?php echo $dato->destino_reporte_whatsapp; ?></td>
                                <td><?php echo $dato->fecha_reporte_formal; ?></td>
                                <td><?php echo $dato->destino_reporte_formal; ?></td>

                            </tr>
                            <?php
                        }
                        ?>
                    </thead>
            
                </table>

            </div>
        </div>
     <div class="d-grid gap-2 d-md-block">
     <a class="btn btn-light btn btn-outline-primary" href="formulario.php">Volver</a>
  
    </div>
</body>
</html>