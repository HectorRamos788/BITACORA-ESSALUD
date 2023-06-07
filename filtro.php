<?php
sleep(1);
include('config.php');

$fechaInit = date("Y-m-d", strtotime($_POST['f_ingreso']));
$fechaFin  = date("Y-m-d", strtotime($_POST['f_fin']));

$bitacora = ("SELECT * FROM bitacora WHERE  `Fecha_ocurrencia` BETWEEN '$fechaInit' AND '$fechaFin'  ORDER BY Fecha_ocurrencia ASC");
$query = mysqli_query($con, $bitacora);

$total   = mysqli_num_rows($query);
echo '<strong>Total: </strong> ('. $total .')';
?>

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
        </tr>
    </thead>
    <?php
    $i = 1;
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