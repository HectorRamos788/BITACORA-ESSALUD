<?php

if (isset($_SESSION['nombre'])) {
  header('Location: formulario.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Login Birtacora</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body class="d-flex justify-content-center align-items-center vh-100 " style="background-color: #44bcd8;">
  <form action="loginProceso.php" method="POST">
    <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">
      <div class="d-flex justify-content-center">
        <img src="login/logo/logo.png" alt="login-icon" style="height: 7rem" />
      </div>
      <div class="text-center fs-1 fw-bold">Iniciar Sesión</div>
      <div class="input-group mt-4">
        <div class="input-group-text bg-info">
          <img src="login/logo/dni.png" alt="username-icon" style="height: 1rem" />
        </div>
        <input class="form-control bg-light" type="text" id="dni" placeholder="Documento de Identidad" name="codigo"
          required onkeypress="return validarKey(event);" />
      </div>
      <div class="input-group mt-1">
        <div class="input-group-text bg-info">
          <img src="login/logo/contrasena.png" alt="password-icon" style="height: 1rem" />
        </div>
        <input class="form-control bg-light" type="password" placeholder="Contraseña" autocomplete="off" name="password"
          required />
      </div>
      <div class="d-flex justify-content-around mt-1">
        <div class="d-flex align-items-center gap-1">
          <input class="form-check-input" type="checkbox" />
          <div class="pt-1" style="font-size: 0.9rem">Recordar</div>
        </div>
        <div class="pt-1">
          <a href="#" class="text-decoration-none text-info fw-semibold fst-italic" style="font-size: 0.9rem">¿Olvidaste
            tu contraseña?</a>
        </div>
      </div>


      <div>
        <input class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm" type="submit" value="Ingresar">

      </div>
      <div class="d-flex gap-1 justify-content-center mt-1">
        <div>¿No tienes una cuenta?</div>
        <a href="signup.php" class="text-decoration-none text-info fw-semibold">Registrarse</a>
      </div>
  </form>
  <script>
    function validarKey(evt) {

      // code is the decimal ASCII representation of the pressed key.
      var code = (evt.which) ? evt.which : evt.keyCode;

      if (code == 8) { // backspace.
        return true;
      } else if (code >= 48 && code <= 57) { // is a number.
        return true;
      } else { // other keys.
        return false;
      }
    }
  </script>
  </script>
</body>


</html>