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
	$datoscliente = $pdo->mysql->prepare("select * from usuario where id = :id");
	$datoscliente->bindParam(":id", $id, PDO::PARAM_INT);
	$datoscliente->execute();
	$cliente = $datoscliente->fetch();


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
    <input autocomplete="off" type="text" name="nombre" class="form-control" maxlength="30" required="true"  placeholder="Enter nombre" value="<?php echo $cliente['nombre']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">apellido</label>
    <input autocomplete="off" type="text" name="apellido" class="form-control" maxlength="30" required="true"  placeholder="Enter apellido" value="<?php echo $cliente['apellido']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">correo</label>
    <input autocomplete="off" type="email" name="correo"  class="form-control"  maxlength="50" required="true"  placeholder="Enter correo" value="<?php echo $cliente['correo']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">telefono</label>
    <input autocomplete="off" type="text" name="telefono" class="form-control" maxlength="10" required="true" pattern="[0-9]{1,10}" placeholder="Enter telefono" value="<?php echo $cliente['telefono']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">ciudad</label>
    <input autocomplete="off" type="text" name="ciudad"  class="form-control"  maxlength="20" required="true"  placeholder="Enter ciudad" value="<?php echo $cliente['ciudad']; ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">direccion</label>
    <input autocomplete="off" type="text" name="direccion" class="form-control" maxlength="15" required="true"  placeholder="Enter direccion" value="<?php echo $cliente['direccion']; ?>">
  </div>

  
        <div class="modal-footer">
  <button type="submit" class="btn btn-primary">Enviar</button>
</div>

</form>
</div>
</body>
</html> 
