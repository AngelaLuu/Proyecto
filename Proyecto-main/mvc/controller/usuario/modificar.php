<!DOCTYPE html>
<html>
<head>
	<title>Modificar</title>
</head>
<body>

<form method="post" action="../../../controller/usuario/actualizar.php">
<?php
$pdo = new db();
try
{
	$id = $_GET["id"];
	$datosusuario = $pdo->mysql->prepare("select * from usuario where id = :id_Usuario");
	$datosusuario->bindParam(":id", $id, PDO::PARAM_INT);
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
    <input autocomplete="off" type="text" name="id" class="form-control" maxlength="10" required="true"  placeholder="Enter id" value="<?php echo $id; ?>" readonly='readonly'>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">nombre</label>
    <input autocomplete="off" type="text" name="nombre" class="form-control" maxlength="30" required="true"  placeholder="Enter nombre" value="<?php echo $usuario['nombre']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">apellido</label>
    <input autocomplete="off" type="text" name="apellido" class="form-control" maxlength="30" required="true"  placeholder="Enter apellido" value="<?php echo $usuario['apellido']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">correo</label>
    <input autocomplete="off" type="email" name="email"  class="form-control"  maxlength="50" required="true"  placeholder="Enter email" value="<?php echo $usuario['email']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">contraseña</label>
    <input autocomplete="off" type="text" name="password" class="form-control" maxlength="10" required="true" pattern="[0-9]{1,10}" placeholder="Enter password" value="<?php echo $usuario['password']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">documento</label>
    <input autocomplete="off" type="text" name="document"  class="form-control"  maxlength="20" required="true"  placeholder="Enter document" value="<?php echo $usuario['document']; ?>">
  </div>

 

  
        <div class="modal-footer">
  <button type="submit" class="btn btn-primary">Enviar</button>
</div>

</form>
</div>
</body>
</html> 
