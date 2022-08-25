<?php
session_start();
 $validacion = '';
    require("../model/mysql.php");
    if (isset($_POST['user'])) {
        $user=$_POST['user'];
        $password=$_POST['password'];
        $pdo = new db();   
        $cuentas = $pdo->mysql->query("select * from usuario where Correo_Usuario='$user' and Password_Usuario='$password' and estado_Usuario='activo'");
        foreach($cuentas as $cuenta)
        {
            $_SESSION['Correo'] = $cuenta['Correo_Usuario'];
            $_SESSION['sesion'] = $cuenta['Correo_Usuario'];

           
            header("Location: layout/layout.php");
        }
        $validacion ="<div class='alert alert-danger'><center><strong>Ojo!</strong> el usuario o contraseña es incorrecta.</div>" ;
        
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>INICIO SESION</title>
         <link rel="stylesheet" href="css/login.css">	
    </head>
    <body>
    
    <div class="caja1">
            <div class="botondeintercambiar">
                <div id="btnvai"></div>
                 <button type="button" class="botoncambiarcaja" onclick="loginvai()" id="vaibtnlogin">Login</button>
                 
            </div>
    <form method="POST" action="login.php" id="frmlogin" class="grupo-entradas">
    <div class="ub1">&#128273; NOMBRE USUARIO</div>
    <input type="text" name="user" placeholder="INGRESAR USUARIO">
    <div class="ub1">&#128274; DIGITE PASSWORD</div>
    <input type="password" name="password" id="txtpassword" placeholder="INGRESAR PASSWORD">
    
    <div class="ub1">
    <input type="checkbox" onclick="verpassword()" >Mostrar contraseña
     </div>

    </select>
    
    <div align="center">
    <input type="submit" value="Ingresar">
    
    <input type="reset" value="Limpiar">
    </div>
    </form>

   