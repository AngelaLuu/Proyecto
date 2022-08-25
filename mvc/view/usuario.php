<div class="container">

    <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table  table-hover table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>lastname</th>
        <th>email</th>
        <th>password</th>
        <th>document</th>
        
        <th colspan="2"><center>Operaciones</center></th>
      </tr>
    </thead>
    <tbody id="myTable">
    <?php
	$pdo = new db();
	$usuarios = $pdo->mysql->query("select * from usuario");
	foreach($usuarios as $usuario)
	{
		echo "<tr>
				<td>{$usuario['id_Usuario']}</td>
				<td>{$usuario['Nombre_Usuario']}</td>
				<td>{$usuario['Apellido_Usuario']}</td>
        <td>{$usuario['Correo_Usuario']}</td>
        <td>{$usuario['Password_Usuario']}</td>
        <td>{$usuario['Documento_Usuario']}</td>
        <td><a title='Modificar' data-toggle='popover' data-trigger='hover' href='?menu=mostrarmodificarusuario&id={$usuario['id_Usuario']}'><i class='fas fa-user-edit'></i></a></td>
        <td><a  title='Eliminar' data-toggle='popover' data-trigger='hover' href='../../../mvc/controller/usuario/eliminar.php?id={$usuario['id_Usuario']}'><i class='fas fa-user-times btn-outline-danger'></i></a></td> </tr>";
  }
  echo __FILE__;
?>
    </tbody>
  </table>
</div>
