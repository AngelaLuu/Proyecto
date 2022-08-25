<?php
$url= $_SERVER["REQUEST_URI"];
if (isset($_GET ['menu'])) { 
    echo $_GET ['menu'];
  
   
   
    if($_GET ['menu'] =='mostrarusuario'){ 
        require_once('../usuario.php'); 
    }
    if($_GET ['menu'] =='mostrarmodificarusuario'){ 
        require_once('../../../controller/usuario/modificar.php');
    } 

} 
else {
    require_once('../../empleado.php'); 
}
?>
