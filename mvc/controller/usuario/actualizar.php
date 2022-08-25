 
<?php

if ($_POST)
{
	require("../../model/mysql.php"); 
	$pdo = new db();
	$document = $_POST["document"]; 
	$name = $_POST["name"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$id= $_POST["id"];
	
	
	try
	{
		$pdo->mysql->beginTransaction();
		$pst = $pdo->mysql->prepare("update usuario set nombre=:nombre,apellido=:apellido,correo=:correo, password=:password where id=:id");
		$pst->bindParam(":document", $document, PDO::PARAM_STR);
		$pst->bindParam(":id", $id, PDO::PARAM_INT);
		$pst->bindParam(":lastname", $lastname, PDO::PARAM_STR);
		$pst->bindParam(":email", $email, PDO::PARAM_STR);
		$pst->bindParam(":password", $password, PDO::PARAM_STR);
		$pst->bindParam(":name", $name, PDO::PARAM_STR);
		

		$pst->execute();
		$pdo->mysql->commit();
		header("Location:../../view/layout/layouts/layout.php?menu=mostrarcliente");
	}
	catch(PDOException $ex)
	{
		$pdo->mysql->rollback();
		echo "El usuario no pudo ser actualizado.<br>".$ex->getMessage();
		echo "<a href='#' onclick=javascript:window.history.back()>Regresar</a>"; 
	}
}
