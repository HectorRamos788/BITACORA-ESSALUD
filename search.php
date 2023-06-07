<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="assets/img/logo-mywebsite-urian-viera.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Database </title>
</head>
<body>
    <div class="page-header bg-secondary text-white text-center">
        <span class="h2">BITACORA ESSI</span>
    
        
        </div> 
        <section>
          <div class="container">
            <div class="row">
              
              <div class="col-md-12 text-center mt-5">
                <form action="DescargarReporte_x_fecha.php" method="post" accept-charset="utf-8">
                  <div class="row">
                    <div class="col">
                      <input type="date" name="fecha_ingreso" class="form-control"  placeholder="Fecha de Inicio" required>
                    </div>
                    <div class="col">
                      <input type="date" name="fechaFin" class="form-control" placeholder="Fecha Final" required>
                    </div>
                    <div class="col">
                      <span class="btn btn-dark mb-2" id="filtro">Filtrar</span>
                      <button type="submit" class="btn btn-primary mb-2">Descargar Reporte</button>
                    </div>
                  </div>
                </form>
              </div>

              <div class="col-md-12 text-center mt-5">     
                <span id="loaderFiltro">  </span>
              </div>
              
              
            <div class="table-responsive resultadoFiltro">
              <table class="table table-bordered border-Secondary" id="tableEmpleados">
                <thead>
                  <tr>
                    <<tr>
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
              include('config.php');
              $sqlTrabajadores = ('SELECT * FROM bitacora ORDER BY idbitacora ASC');
              $query = mysqli_query($con, $sqlTrabajadores);
              $i =1;
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
                    </thead>
            
                </table>

            </div>
        </div>
     <div class="d-grid gap-2 d-md-block">
  
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="assets/js/material.min.js"></script>

  <script>
  $(function() {
      setTimeout(function(){
        $('body').addClass('loaded');
      }, 1000);


//FILTRANDO REGISTROS
$("#filtro").on("click", function(e){ 
  e.preventDefault();
  
  loaderF(true);

  var f_ingreso = $('input[name=fecha_ingreso]').val();
  var f_fin = $('input[name=fechaFin]').val();
  console.log(f_ingreso + '' + f_fin);

  if(f_ingreso !="" && f_fin !=""){
    $.post("filtro.php", {f_ingreso, f_fin}, function (data) {
      $("#tableEmpleados").hide();
      $(".resultadoFiltro").html(data);
      loaderF(false);
    });  
  }else{
    $("#loaderFiltro").html('<p style="color:red;  font-weight:bold;">Debe seleccionar ambas fechas</p>');
  }
} );


function loaderF(statusLoader){
    console.log(statusLoader);
    if(statusLoader){
      $("#loaderFiltro").show();
      $("#loaderFiltro").html('<img class="img-fluid" src="assets/img/cargando.svg" style="left:50%; right: 50%; width:50px;">');
    }else{
      $("#loaderFiltro").hide();
    }
  }
});
</script>

</body>
</html>