<?php

$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$especialidad = $_POST['especialidad'];
$contraseña = $_POST['password'];
$horacita = $_POST ['hora'];

$destinatario = $correo;

$header = "Enviado desde la página de agendamiento de citas web";
$mensajeCompleto = $nombre . $apellido . $telefono . $especialidad . $contraseña . $horacita;

mail ($destinatario, $mensajeCompleto, $header);
echo "<script>alert('revisa tu correo para confirmacion') </script>";
echo "<script> serTimeout(\"location.href='mvc/view/login.php'\,1000)</script>";
