<?php
    session_start();
    require("../../model/mysql.php");
    if (isset($_SESSION["sesion"])) {
    }else {
        header("Location: index.php");
    }

?>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<link rel="stylesheet" href="layout.php">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<style>
        table th, td {
    text-align: center;
    }
    nav{
      margin-bottom: 5vh;
    }
        body{
        font-family: "Century Gothic", CenturyGothic;

        }
    .navbar-nav {
    border-bottom: 1px  solid black;
    padding: 0px 15px ;
    }
        #linea {
    border-bottom: 1.5px  solid black;
    border-top: 1.5px  solid black;
    }

    .title {
                font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
                font-size: 30px;
            padding: 0px;
            margin: 0px;
                text-align: center;
                text-transform: uppercase;
                text-rendering: optimizeLegibility;
                border-radius: 0px;

            }
    li:hover{
        margin:0px 7px ;
        transition-duration: 0.5s;
    }
    footer {
        width: auto;
        margin-top: 150px;
        -webkit-box-sizing:border-box;
        -moz-box-sizing:border-box;
        box-sizing:border-box;
        background: transparent;
        border-top: 2px solid #000;
        
    }
</style>

<header>
    <nav class="navbar navbar-expand-lg    text-dark ">
        <a class="navbar-brand text-dark title" href="#" >CarTech</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li class="nav-item">
                <a class='nav-link text-dark' href='menu.php'><i class='fas fa-home'></i>  menu</a>
                </li>
                <?php

                     
                        
                        echo"
                           
                            <li class='nav-item'>
                            <a class='nav-link text-dark' href='?menu=mostrarusuario'><i class='fas fa-user'></i>  Usuarios</a>
                            </li>";
                           
                    
                   
                ?>
                <li class='nav-item'>
                <a class='nav-link text-dark' href='?menu=mostrarperfil'><i class='fas fa-user'></i> perfil</a>
                </li>
                <li class='nav-item'>
                <a class='nav-link text-dark' title='Cerrar sesion' data-toggle='popover' data-trigger='hover' href='cerrar.php'><i class='fas fa-power-off'></i>  </a>
                </li>
            </div>
        </div>
    </nav>
</header> 
