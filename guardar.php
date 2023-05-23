<?php

require_once "conexionsignup.php";

$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];
$gmail = $_POST['email'];
$celular = $_POST['celular'];
$pass = $_POST['pass'];
$query = "SELECT codigo FROM usuario WHERE codigo = ?";
$sql_u = $pdo->prepare($query);
$sql_u->execute(array($codigo));
$count = count($sql_u->fetchAll());
if ($count > 0) {
    include("signup.php");
    ?>
    <P></P>
    <h4 color="red" style="text-align:center;">Usuario Existente</h4>
    <?php
} else {
    $consulta = $pdo->prepare("INSERT INTO usuario(nombre,codigo,email,telefono,contrasena)VALUES(:nombre,:codigo,:email,:celular,:pass)");

    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':codigo', $codigo);
    $consulta->bindParam(':email', $gmail);
    $consulta->bindParam(':celular', $celular);
    $consulta->bindParam(':pass', $pass);

    if ($consulta->execute()) {
        header("location:login.php");
    } else {
        echo "No se ha podido guardar datos ...";
    }
}


?>