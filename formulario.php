<?php

session_start();
if (!isset($_SESSION['nombre'])) {
  header('Location: login.php');
} elseif (isset($_SESSION['nombre'])) {
  if (isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['fecha_actual']) && isset($_POST['hora_actual']) && isset($_POST['cas']) && isset($_POST['checkbox']) && isset($_POST['modulos']) && isset($_POST['detalle']) && isset($_POST['responsable']) && isset($_POST['UsuarioR']) && isset($_POST['fechasoporteessi']) && isset($_POST['fechasoportemesa']) && isset($_POST['nroCasoMesa']) && isset($_POST['fechaTelef']) && isset($_POST['destinoTelef']) && isset($_POST['fechaEmail']) && isset($_POST['destinoEmail']) && isset($_POST['fechaWspp']) && isset($_POST['destinoWspp']) && isset($_POST['fechaFormal']) && isset($_POST['destinoFormal']))
    require_once "database.php";
} else {
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
  <link rel="stylesheet" href="style.css">
  <title>Bitacora</title>
</head>

<body style="background-color: #FAFAFA;">
  <nav class="navbar navbar-dark " style="background-color: #44bcd8;">
    <div class="container-fluid">
      <a class="navbar-brand">EsSalud</a>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">

      </div>
      <a class="btn btn-light" href="cerrar.php"> Cerrar Sesion</a>
    </div>
  </nav>
  <div class="page-header bg-secondary text-white text-center">
    <span class="h2">BITACORA ESSI</span>
  </div>
  <p></p>
  <form action="insertar.php" method="POST" style=" width: 65%; margin: 0 auto;" id="form">
    <legend class="text-center-success">REGISTRO DE OCURRENCIA</legend>

    <div class="input-group mb-3">
      <span class="input-group-text" for="fecha">Fecha de la Ocurrencia</span>
      <input type="date" class="form-control" placeholder="Username" aria-label="Username"
        aria-describedby="basic-addon1" name="fecha" id="fechaRegistro" required>
      <span class="input-group-text" for="hora"">Hora de la Ocurrencia</span>
      <input type="time" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="hora" id="startTime" required>
    </div>

    <p></p>
    <div class="form-floating dropdown">
      <select class="form-select" name="cas" id="cas" aria-label="Floating label select example" required>
        <option></option>
        <option value="Hospital Nacional Carlos Alberto Seguin Escobedo">Hospital Nacional Carlos Alberto Seguin
          Escobedo
        </option>
        <option value="Hospital II Manuel de Torres Muñoz - Mollendo">Hospital II Manuel de Torres Muñoz - Mollendo
        </option>
        <option value="Hospital I Samuel Pastor - Camaná">Hospital I Samuel Pastor - Camaná</option>
        <option value="Hospital III Yanahuara">Hospital III Yanahuara</option>
        <option value="Hospital I Edmundo Escomel">Hospital I Edmundo Escomel</option>
        <option value="CAP III Melitón Salas">CAP III Melitón Salas</option>
        <option value="Centro Médico Aplao">Centro Médico Aplao</option>
        <option value="CAP I Chivay">CAP I Chivay</option>
        <option value="CAP II Hunter">CAP II Hunter</option>
        <option value="CAP I El Pedregal">CAP I El Pedregal</option>
        <option value="CAP I Yura">CAP I Yura</option>
        <option value="CAP III Paucarpata">CAP III Paucarpata</option>
        <option value="CAP III Miraflores">CAP III Miraflores</option>
        <option value="Centro de Complejidad Creciente Cerro Colorado">Centro de Complejidad Creciente Cerro Colorado
        </option>
        <option value="Posta Médica Acarí">Posta Médica Acarí</option>
        <option value="Posta Médica Atico">Posta Médica Atico</option>
        <option value="Posta Médica Caravelí">Posta Médica Caravelí</option>
        <option value="Posta Médica Chala">Posta Médica Chala</option>
        <option value="Posta Médica Chucarapi">Posta Médica Chucarapi</option>
        <option value="Posta Médica Chuquibamba">Posta Médica Chuquibamba</option>
        <option value="Posta Médica Corire">Posta Médica Corire</option>
        <option value="Posta Médica Cotahuasi">Posta Médica Cotahuasi</option>
        <option value="Posta Medica La Joya">Posta Medica La Joya</option>
        <option value="Posta Médica Mataran">Posta Médica Matarani</option>
        <option value="Posta Médica Santa Rita">Posta Médica Santa Rita</option>
        <option value="Posta Médica Vitor">Posta Médica Vitor</option>
        <option value="Policlínico Metropolitano">Policlínico Metropolitano</option>
      </select>
      <label for="floatingSelect">Dependencia:</label>
    </div>
    <p id="cas_error" class="error_message"></p>
    <p></p>
    <div class="form-group" required>
      <label for="essi">ESSI/Explota: </label>
    </div>
    <label><input type="radio" id="essi" name="checkbox[]" value="Essi" required="required"> ESSI</label><br>

    <input type="radio" id="explota" name="checkbox[]" value="Explota" required="required"> <label
      for="cbox2">EXPLOTA</label>


    <p></p>
    <div class="form-floating dropdown">
      <select class="form-select" name="modulos" id="modulo" required>
        <option></option>
        <option value="Admisión y Citas">Admisión y Citas</option>
        <option value="Consulta Externa">Consulta Externa</option>
        <option value="Emergencia">Emergencia</option>
        <option value="Hospitalización">Hospitalización</option>
        <option value="Centro Quirúrgico">Centro Quirúrgico</option>
        <option value="Farmacia y Depósitos">Farmacia y Depósitos</option>
        <option value="Ayuda al Dx">Ayuda al Dx</option>
        <option value="Reportes">Reportes</option>
        <option value="Utilitarios">Utilitarios</option>
        <option value="Tablas del Sistema">Tablas del Sistema</option>
        <option value="Liquidaciones">Liquidaciones</option>
        <option value="Seguridad">Seguridad</option>
      </select>
      <label for="floatingSelect">Modulo:</label>
    </div>
    <p></p>

    <div class="form-group">
      <label for="detalle"> <i class="bi bi-chat-right-dots-fill" required></i> Detalle del problema:</label>
      <textarea name="detalle" id="detalle" class="form-control" placeholder="ej." required></textarea>
      <div class="detalle text-danger"></div>

    </div>
    <p></p>

    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-sm-6 border border-right-0   p-2" style="background-color: #EDF0F0;">
          Responsable que registra:
        </div>
        <div class="col-xl-9 col-sm-6 border border-left-0  p-2" style="background-color: #E0E3E3;">
          <?php echo $_SESSION['nombre'] ?>
        </div>
      </div>
    </div>



    <p></p>
    <div class="input-group mb-3">
      <span class="input-group-text" for="UsuarioR">Usuario que reporta</span>
      <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="UsuarioR"
        required>
    </div>

    <p></p>
    <div class="input-group mb-3">
      <span class="input-group-text" for="fechaSoporteEssi">Fecha a soporte ESSI</span>
      <input type="date" class="form-control" placeholder="Username" aria-label="Username"
        aria-describedby="basic-addon1" name="fechasoporteessi" id="fechaSoporteEssi" required>
        <span class="input-group-text" for="fechaSoporteMesa"">Fecha Soporte Mesa de Ayuda</span>
      <input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="fechasoportemesa" id="fechaSoporteMesa" onchange=" destinoOnChange(5);" required>
    </div>
    <p></p>
    <div class="form-group">
      <label for="nroCasoMesa">Numero de Caso Mesa de Ayuda:</label>
      <input type="text" class="form-control" name="nroCasoMesa" onkeypress="return validarKey(event);" id='numero-caso' disabled="true>

    </div>
    <p></p>
    <div class="form-group">
      <label for="reporteTelef">Reporte Telefonico a:</label>
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" for="fechaTelef">Fecha</span>
      <input onchange="destinoOnChange(1);" type="date" class="form-control" placeholder="Username"
        aria-label="Username" aria-describedby="basic-addon1" name="fechaTelef" id="fechaTelefono" >
      <span class="input-group-text" for="destinoTelf"">Destino</span>
      <input id='reporte-telefonico' disabled=" true" type=" text" class="form-control" aria-label="Username"
        aria-describedby="basic-addon1" name="destinoTelef" autocomplete="off" >
    </div>
    <p></p>
    <div class="form-group">
      <label for="reporteEmail">Reporte por Email a:</label>
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" for="fechaEmail">Fecha</span>
      <input onchange=" destinoOnChange(2);" type="date" class="form-control" placeholder="Username"
        aria-label="Username" aria-describedby="basic-addon1" name="fechaEmail" id="fechaEmail" >
      <span class="input-group-text" for="destinoEmail"">Destino</span>
      <input  id='reporte-email' disabled=" true" type=" text" class="form-control" aria-label="Username"
        aria-describedby="basic-addon1" name="destinoEmail" autocomplete="off" >
    </div>
    <p></p>
    <div class="form-group">
      <label for="reporteWspp">Reporte por Whatsapp a: </label>
    </div>
    <div class="input-group mb-3 ">
      <span class="input-group-text" id="fechaReporteWssp">Fecha</span>
      <input onchange="destinoOnChange(3);" type="date" class="form-control" placeholder="Username"
        aria-label="Username" aria-describedby="basic-addon1" name="fechaWspp" id="fechaWspp" >
      <span class="input-group-text" id="destinoWssp">Destino</span>
      <input id="reporte-whatsapp" disabled="true" type="text" class="form-control" aria-label="Username"
        aria-describedby="basic-addon1" name="destinoWspp" autocomplete="off" >

    </div>
    <p></p>

    <div class="form-group">
      <label for="reporteFormal">Reporte Formal a:</label>
      <div class="input-group mb-3 ">
        <span class="input-group-text" id="fechaRegistroFormal">Fecha</span>
        <input onchange="destinoOnChange(4);" type="date" class="form-control" placeholder="Username"
          aria-label="Username" aria-describedby="basic-addon1" name="fechaFormal" id="fechaFormal" >
        <span class="input-group-text" id="destinoFormal">Destino</span>
        <input id="reporte-formal" disabled="true" type="text" class="form-control" aria-label="Username"
          aria-describedby="basic-add-on1" name="destinoFormal" autocomplete="off" >
      </div>
    </div>
    <p></p>
    <div class="form-group">
      <input type="submit" id="enviarform" class="btn btn-primary form-control" style="background-color: #808080;">
    </div>
    <p></p>
    <p></p>
    <p></p>
    <input type="hidden" name="oculto" value="1">
    <script> src</script>
    <script>
      fechaRegistro.max = new Date().toISOString().split("T")[0];
      fechaSoporteEssi.max = new Date().toISOString().split("T")[0];
      fechaSoporteMesa.max = new Date().toISOString().split("T")[0];
      fechaTelefono.max = new Date().toISOString().split("T")[0];
      fechaEmail.max = new Date().toISOString().split("T")[0];
      fechaWspp.max = new Date().toISOString().split("T")[0];
      fechaFormal.max = new Date().toISOString().split("T")[0];
    </script>

    <script>
      function validarKey(evt) {

        
        var code = (evt.which) ? evt.which : evt.keyCode;

        if (code == 8) { // backspace.
          return true;
        } else if (code >= 48 && code <= 57) { // is a number.
          return true;
        } else { // other keys.
          return false;
        }
      }


      function validarFormulario() {
        var cas = document.getElementById("cas").value;
        var modulo = document.getElementById("modulo").value;


        if (cas === "" || modulo === "") {
          alert("Por favor, complete todos los campos."); 
          return false;
        }
        return true;
      }

      const validarFecha = () => {
        let fechaSoporteEssi = document.getElementById("fechaSoporteEssi");
        let fechaSoporteMesa = document.getElementById("fechaSoporteMesa");
        if (fechaSoporteEssi.value.length == empty) {
          fechaSoporteMesa.setAttribute('disabled', '');
        } else {
          fechaSoporteEssi.removeAttribute('disabled', '');

        }
      }



      const destinoOnChange = (id) => {
        const reporte_telefonico = document.getElementById("reporte-telefonico");
        const reporte_email = document.getElementById("reporte-email");
        const reporte_whatsapp = document.getElementById("reporte-whatsapp");
        const reporte_formal = document.getElementById("reporte-formal");
        const numero_caso = document.getElementById("numero-caso");
        console.log(reporte_telefonico.value);
        if (id == 1) {

          if (fechaTelefono.value != "") {
            reporte_telefonico.disabled = false;
          }
          else {
            reporte_telefonico.disabled = true;
          }
        }
        else if (id == 2) {
          if (fechaEmail.value != "") {
            reporte_email.disabled = false;
          }
          else {
            reporte_email.disabled = true;
          }

        }
        else if (id == 3) {
          if (fechaWspp.value != "") {
            reporte_whatsapp.disabled = false;
          }
          else {
            reporte_whatsapp.disabled = true;
          }

        }
        else if (id == 4) {
          if (fechaFormal.value !== "") {
            reporte_formal.disabled = false;
          }
          else {
            reporte_formal.disabled = true;
          }
        }
        else if (id == 5) {
          if (fechaSoporteMesa.value !== "") {
            numero_caso.disabled = false;
          }
          else {
            numero_caso.disabled = true;
          }
      }
    }
    </script>

  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>


</body>