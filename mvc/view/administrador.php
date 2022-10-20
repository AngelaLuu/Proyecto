<div class="container-fluid">
<?php
    if ($_SESSION['cargo']== "cajero") {
      die();
    }
    if ($_SESSION['cargo']== "almacenista") {
      die();
    }
    require_once('formularios/empleadoregistrar.php');
    $mostrar=" ";
    $ver= "";
    if (isset($_POST['mostrar'])) {
      if ($_POST['mostrar']=="todos") {
      }else {
        $ver = $_POST['mostrar'];
        $mostrar= " and estado = '$ver'";  
      }
  }

?>
  <br>
  <table class="table  table-hover table-striped">
    <thead>
      <tr>
      <th>id</th>
        <th>Nombre</th>
        <th>apellido</th>
        <th>correo</th>
        <th>telefono</th>
        <th>Cargo</th>
        <th>Usuario</th>
        <th>Cargo</th>
        <th>estado</th>
        <th colspan="3"><center>Operaciones</center></th>
      </tr>
    </thead>
    <tbody id="myTable">
    <?php
        $pdo = new db();
        $empleados = $pdo->mysql->query("select *, p.nombre as cargop from usuario u, perfil p, empleado e where p.perfil=u.perfil and e.id=u.empleado $mostrar");
        foreach($empleados as $empleado) 
        {
            echo "<tr";
            
            if ($empleado['estado']=="inactivo") {

              echo " class='table-danger'";
            }
            
            echo ">
                    <td>{$empleado['id']}</td>
                    <td>{$empleado['nombre']}</td>
                    <td>{$empleado['apellido']}</td>
                    <td>{$empleado['correo']}</td>
                    <td>{$empleado['telefono']}</td>
                    <td>{$empleado['cargo']}</td>
                    <td>{$empleado['usuario']}</td>
                    <td>{$empleado['cargop']}</td>
                    <td>{$empleado['estado']}</td>
                    <td><a title='Modificar' data-toggle='popover' data-trigger='hover' href='?menu=mostrarmodificarempleado&id={$empleado['id']}'><i class='fas fa-user-edit'></i></a></td>
                    <td><a  title='Inhabilitar' data-toggle='popover' data-trigger='hover' href='../../../../mvc/controller/empleado/estado.php?id={$empleado['id']}'>";
                    if ($empleado['estado']=="activo") {
                      echo "<i class='fas fa-user-times btn-outline-danger'></i></a></td>";
                    }else {
                       echo "<i class='fas fa-check btn-outline-success'></i></a></td>";
                    }
                    //<td><a href='../../../../mvc/controller/empleado/eliminar.php?id={$empleado['id']}'><i class='fas fa-user-times btn-outline-danger'></i></a></td>
          }
    ?>
    </tbody>
    </table>

</div>