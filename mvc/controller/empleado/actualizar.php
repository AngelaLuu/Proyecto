 
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
	$id= intval($_POST["id_Usuario"]);

	try
	{
		$pdo->mysql->beginTransaction();
		//$pst = $pdo->mysql->prepare("update usuario set Nombre_Usuario=:name where id_Usuario=:id_Usuario");
		$pst = $pdo->mysql->prepare("update usuario set Nombre_Usuario=:name,Documento_Usuario=:document, Apellido_Usuario=:lastname,Correo_Usuario=:email, Password_Usuario=:password where id_Usuario=:id_Usuario");

		$pst->bindParam(":id_Usuario", $id, PDO::PARAM_INT);
		$pst->bindParam(":name", $name, PDO::PARAM_STR);
		$pst->bindParam(":document", $document, PDO::PARAM_STR);
		$pst->bindParam(":lastname", $lastname, PDO::PARAM_STR);
		$pst->bindParam(":email", $email, PDO::PARAM_STR);
		$pst->bindParam(":password", $password, PDO::PARAM_STR);
		

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
