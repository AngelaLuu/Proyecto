 
<?php

if ($_POST)
{
	require("../../model/mysql.php"); 
	$pdo = new db();
	$id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$ciudad = $_POST["ciudad"];
	$direccion = $_POST["direccion"];

	



	try
	{
		$pdo->mysql->beginTransaction();
		$pst = $pdo->mysql->prepare("update cliente set nombre=:nombre,apellido=:apellido,correo=:correo,telefono=:telefono,ciudad=:ciudad,direccion=:direccion  where id=:id");
		$pst->bindParam(":id", $id, PDO::PARAM_STR);
		$pst->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$pst->bindParam(":apellido", $apellido, PDO::PARAM_STR);				
		$pst->bindParam(":correo", $correo, PDO::PARAM_STR);	
		$pst->bindParam(":telefono", $telefono, PDO::PARAM_STR);	
		$pst->bindParam(":ciudad", $ciudad, PDO::PARAM_STR);
		$pst->bindParam(":direccion", $direccion, PDO::PARAM_STR);

		$pst->execute();
		$pdo->mysql->commit();
		header("Location:../../view/layout/layouts/layout.php?menu=mostrarcliente");
	}
	catch(PDOException $ex)
	{
		$pdo->mysql->rollback();
		echo "El cliente no pudo ser actualizado.<br>".$ex->getMessage();
		echo "<a href='#' onclick=javascript:window.history.back()>Regresar</a>"; 
	}
}
