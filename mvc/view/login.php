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
            $_SESSION['rol'] = $cuenta ['rol'];

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
                <button type="button" class="botoncambiarcaja" onclick="registrarvai()" id="vaibtnlogin">Registrar</button>
            </div>
            
            <form method="POST" action="login.php" id="frmlogin" class="grupo-entradas">
                <div class="ub1">&#128273; CORREO USUARIO</div>
                <input type="text" name="user" placeholder="INGRESAR CORREO">
                <div class="ub1">&#128274; DIGITE PASSWORD</div>
                <input type="password" name="password" id="txtpassword" placeholder="INGRESAR PASSWORD">
                
                <div class="ub1">
                    <input type="checkbox" onclick="verpassword()" >Mostrar contraseña
                </div>
                
                <div align="center">
                    <input type="submit" value="Ingresar">
                    <input type="reset" value="Limpiar">
                </div>
            </form>

            <!----------------------------------------REGISTRO------------------------------------------------->
            <form method="POST" action="../controller/usuario/guardar.php" id="frmregistrar" class="grupo-entradas">
                <div class="ub1">&#128273; DOCUMENTO </div>
                <input type="text" name="document" placeholder="Ingresar documento usuario">

                <div class="ub1">&#128274; NOMBRE </div>
                <input type="text" name="name" placeholder="Ingresar Nombre usuario">

                <div class="ub1">&#128274; APELLIDO </div>
                <input type="text" name="lastname" placeholder="ingresar Apellido usuario">

                <div class="ub1">📧 CORREO </div>
                <input type="text"  name="email" placeholder="Ingresar correo">

                <div class="ub1">&#128274; INGRESAR PASSWORD</div> 
                <input type="password" name="password" id="txtpassword2" placeholder="Ingresar password">
                
                <div class="ub1">
                    <input type="checkbox" onclick="verpassword2()" >Mostrar contraseña
                </div>
                
                <div align="center">
                    <input type="submit" value="Registrar">
                    <input type="reset" value="Limpiar">
                </div>
            </form>
        </div>
    </body>
    <script>
        function verpassword() {
            var tipo = document.getElementById("password");
            if (tipo.type == "password") {
                tipo.type = "text";
            } else {
                tipo.type = "password";
            }
        }
        function verpassword2() {
            var tipo = document.getElementById("txtpassword2");
            if (tipo.type == "password") {
                tipo.type = "text";
            } else {
                tipo.type = "password";
            }
        }

        var x = document.getElementById("frmlogin");
        var y = document.getElementById("frmregistrar");
        var z = document.getElementById("btnvai");

        function registrarvai() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function loginvai() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
    </script>
</html>
