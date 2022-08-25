 
<?php

if ($_POST)
{
	require("../../model/mysql.php"); 
	$pdo = new db();
	$document = $_POST["Documento_Usuario"]; 
	$name = $_POST["Nombre_Usuario"];
	$lastname = $_POST["Apellido_Usuario"];
	$email = $_POST["Correo_Usuario"];
	$password = $_POST["Password_Usuario"];
	$id= $_POST["id_Usuario"];
	echo $id;
	
	
	try
	{
		$pdo->mysql->beginTransaction();
		$pst = $pdo->mysql->prepare("update usuario set Nombre_Usuario=:nombre,Documento_Usuario=:documento, Apellido_Usuario=:apellido,Correo_Usuario=:correo, Password_Usuario=:password where id_Usuario=1");
		$pst->bindParam(":document", $document, PDO::PARAM_STR);
		//$pst->bindParam(":id", $id, PDO::PARAM_INT);
		$pst->bindParam(":lastname", $lastname, PDO::PARAM_STR);
		$pst->bindParam(":email", $email, PDO::PARAM_STR);
		$pst->bindParam(":password", $password, PDO::PARAM_STR);
		$pst->bindParam(":name", $name, PDO::PARAM_STR);
		

		$pst->execute();
		$pdo->mysql->commit();
		header("Location:../../view/layout/layout.php?menu=mostrarusuario");
	}
	catch(PDOException $ex)
	{
		$pdo->mysql->rollback();
		echo "El usuario no pudo ser actualizado.<br>".$ex->getMessage();
		echo "<a href='#' onclick=javascript:window.history.back()>Regresar</a>"; 
	}
}
