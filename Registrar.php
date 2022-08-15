<?php

include 'conexion.php';

$Usuario = $_POST ['NombreUsuario'];
$Correo_Usuario = $_POST ['CorreoUsuario'];
$Password_Usuario = $_POST ['PasswordUsuario'];
$Apellido_Usuario = $_POST ['ApellidoUsuario'];
$Documento_Usuario = $_POST ['DocumentoUsuario']


$query = "insert into usuario (NombreUsuario, CorreoUsuario, PasswordUsuario, ApellidoUsuario, DocumentoUsuario) values ('$Usuario','$Correo_Usuario','$Password_Usuario','$Apellido_Usuario','$Documento_Usuario')";

$verificar_nombre= mysqli_query ($conexion, "select * from usuario where NombreUsuario='$Usuario' "); 
if (mysqli_num_rows($verificar_nombre) > 0 ){
    echo '
    <script>
    alert ("Nombre de usuario en uso");
    window.location = "../index.php"=;
    </script>
    
    ';

    exit();

}

$verificar_Correo= mysqli_query ($conexion, "select * from usuario where CorreoUsuario='$Correo_Usuario' ");
if (mysqli_num_rows($verificar_Correo) > 0 ){
    echo '
    <script>
    alert ("Correo en uso"):
    window.location = "../index.php"=;
    </script>
    
    ';

    exit();
}

$verificar_Password= mysqli_query ($conexion, "select * from usuario where PasswordUsuario='$Password_Usuario' ");
if (mysqli_num_rows($verificar_Password) > 0 ){
    echo '
    <script>
    alert ("Contraseña en uso"):
    window.location = "../index.php"=;
    </script>
    
    ';

    exit();
}

$verificar_Documento= mysqli_query ($conexion, "select * from usuario where DocumentoUsuario='$Documento_Usuario' ");
if (mysqli_num_rows($verificar_Documento) > 0 ){
    echo '
    <script>
    alert ("Documento en uso"):
    window.location = "../index.php"=;
    </script>
    
    ';

    exit();
}

$verificar_Apellido= mysqli_query ($conexion, "select * from usuario where ApellidoUsuario='$Apellido_Usuario' ");
if (mysqli_num_rows($verificar_Documento) > 0 ){
    echo '
    <script>
    alert ("Apellido invalido"):
    window.location = "../index.php"=;
    </script>
    
    ';

    exit();
}

$ejecutar = mysqli_query ($conexion, $query);
if ($ejecutar) {
    echo '
    <script>
    alert("Usuario registrado correctamente");
    window.location = "/menu.php";
    </script>

    ';
    exit();

}

 