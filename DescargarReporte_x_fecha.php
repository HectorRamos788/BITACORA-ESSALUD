<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!--Importante--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar</title>
    <style>
    .color{
        background-color: #9BB;  
    }
</style>
</head>
<body>
    
<?php
include('config.php');
$fecha = date("d_m_Y");


/**PARA FORZAR LA DESCARGA DEL EXCEL */
header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
$filename = "ReporteExcel_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");


/***RECIBIENDO LAS VARIABLE DE LA FECHA */
$fechaInit = date("Y-m-d", strtotime($_POST['fecha_ingreso']));
$fechaFin  = date("Y-m-d", strtotime($_POST['fechaFin']));
                    

$sqlTrabajadores = ("SELECT * FROM bitacora WHERE (Fecha_ocurrencia>='$fechaInit' and Fecha_ocurrencia<='$fechaFin') ORDER BY Fecha_ocurrencia ASC");
$query = mysqli_query($con, $sqlTrabajadores);
?>

<table class="table table-bordered border-Secondary" id= "bitacora" style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
                    <thead>
                        <tr>
                            <th rowspan="2">ID</th>
                            <th rowspan="2">Fecha de la Ocurrencia</th>
                            <th rowspan="2">Hora de la Ocurrencia</th>
                            <th rowspan="2">Fecha de Registro</th>
                            <th rowspan="2">Hora de Registro</th>
                            <th rowspan="2">Dependencia</th>
                            <th rowspan="2">ESSL/Explota</th>
                            <th rowspan="2">Modulo</th>
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
                        </thead>

<?php
    while ($dataRow = mysqli_fetch_array($query)) { ?>
    <tbody>
        <tr>
            <td><?php echo $dataRow['idbitacora']; ?></td>
            <td><?php echo $dataRow['Fecha_ocurrencia']; ?></td>
            <td><?php echo $dataRow['Hora_ocurrencia'] ; ?></td>
            <td><?php echo $dataRow['fecha_registro'] ; ?></td>
            <td><?php echo $dataRow['hora_registro'] ; ?></td>
            <td><?php echo $dataRow['CAS'] ; ?></td>
            <td><?php echo $dataRow['essi_explota']; ?></td>
            <td><?php echo $dataRow['modulo']; ?></td>
            <td><?php echo $dataRow['detalle'] ; ?></td>
            <td><?php echo $dataRow['responsable'] ; ?></td>
            <td><?php echo $dataRow['usuario_reporte'] ; ?></td>
            <td><?php echo $dataRow['fecha_essi_soporte'] ; ?></td>
            <td><?php echo $dataRow['fecha_mesa_soporte']; ?></td>
            <td><?php echo $dataRow['num_caso_mesa_ayuda']; ?></td>
            <td><?php echo $dataRow['fecha_reporte_telefono'] ; ?></td>
            <td><?php echo $dataRow['destino_reporte_telefono'] ; ?></td>
            <td><?php echo $dataRow['fecha_reporte_email'] ; ?></td>
            <td><?php echo $dataRow['destino_reporte_email'] ; ?></td>
            <td><?php echo $dataRow['fecha_reporte_whatsapp']; ?></td>
            <td><?php echo $dataRow['destino_reporte_whatsapp']; ?></td>
            <td><?php echo $dataRow['fecha_reporte_formal'] ; ?></td>
            <td><?php echo $dataRow['destino_reporte_formal'] ; ?></td>

        </tr>
    </tbody>
    
<?php } ?>
</table>

</body>
</html>