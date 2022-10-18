<!DOCTYPE html>
<html>
<head>
	<title>Modificar</title>
</head>
<body>

<form method="post" action="../../controller/usuario/actualizar.php">
<?php
$pdo = new db();
try
{
	$id = $_GET["id"];
	$datosusuario = $pdo->mysql->prepare("select * from usuario where id_Usuario = :id_Usuario");
	$datosusuario->bindParam(":id_Usuario", $id, PDO::PARAM_INT);
	$datosusuario->execute();
	$usuario = $datosusuario->fetch();


}
catch(PDOException $e)
{
	print_r($e->getMessage());
}
?>
  <div class="form-group">
    <label for="exampleInputEmail1">id</label>
    <input autocomplete="off" type="number" name="id_Usuario" class="form-control" maxlength="10" required="true"  placeholder="Enter id" value="<?php echo $id; ?>" readonly='readonly'>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">nombre</label>
    <input autocomplete="off" type="text" name="Nombre_Usuario" class="form-control" maxlength="30" required="true"  placeholder="Enter nombre" value="<?php echo $usuario['Nombre_Usuario']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">apellido</label>
    <input autocomplete="off" type="text" name="Apellido_Usuario" class="form-control" maxlength="30" required="true"  placeholder="Enter apellido" value="<?php echo $usuario['Apellido_Usuario']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">correo</label>
    <input autocomplete="off" type="email" name="Correo_Usuario"  class="form-control"  maxlength="50" required="true"  placeholder="Enter email" value="<?php echo $usuario['Correo_Usuario']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">contraseña</label>
    <input autocomplete="off" type="text" name="Password_Usuario" class="form-control" maxlength="10" required="true" placeholder="Enter password" value="<?php echo $usuario['Password_Usuario']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">documento</label>
    <input autocomplete="off" type="text" name="Documento_Usuario"  class="form-control"  maxlength="20" required="true"  placeholder="Enter document" value="<?php echo $usuario['Documento_Usuario']; ?>">
  </div>

 

  
        <div class="modal-footer">
  <button type="submit" class="btn btn-primary">Enviar</button>
</div>

</form>
</div>
</body>
</html> 
