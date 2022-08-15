<?php
echo "entre";
if ($_POST)
{
	require("../../model/mysql.php"); 
	$pdo = new db();
	$document = $_POST["document"]; 
	echo $document;
	$name = $_POST["name"];
	echo $name;
	$lastname = $_POST["lastname"];
	echo $lastname;
	$email = $_POST["email"];
	echo $email;
	$password = $_POST["password"];
	echo $password;
	$id= 120;

	try
	{
		$pdo->mysql->beginTransaction();
	
		$pst = $pdo->mysql->prepare("insert into usuario () values (120 ,'harold@camasf','11561dasd','activo','hhuhas','151156'");
		echo "papa";

		//$pst = $pdo->mysql->prepare("insert into usuario() values(:name,:document,:lastname,:correo,:telefono,:ciudad,:direccion)");
		$pst->bindParam(":document", $document, PDO::PARAM_STR);
		//$pst->bindParam(":id", $id, PDO::PARAM_INT);
		echo "oh";
		$pst->bindParam(":lastname", $lastname, PDO::PARAM_STR);
		echo "aa";
		$pst->bindParam(":email", $email, PDO::PARAM_STR);
		echo "in";
		$pst->bindParam(":password", $password, PDO::PARAM_STR);
		echo "pum";
		$pst->bindParam(":name", $name, PDO::PARAM_STR);
		echo "estoy aqui";


		$pst->execute();
		echo "esti";
		$id = $pdo->mysql->lastInsertId();
		echo "estui";
		$pdo->mysql->commit();
		echo "est";
		//header("Location:../../view/layout/layouts/layout.php?menu=mostrarcliente");
	}
	catch(PDOException $ex)
	{
		$pdo->mysql->rollback();
		echo $ex;

		echo "El cliente ya existe.";
		echo "<a href='#' onclick=javascript:window.history.back()>Regresar</a>"; 
		$HTTP_REFERER;
		//header("Location:".$_SERVER['HTTP_REFERER']); 
		echo "El cliente ya existe.";
	}


}