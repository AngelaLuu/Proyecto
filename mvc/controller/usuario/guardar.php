<?php 

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
	$rol = $_POST["rol"];
	


	try
	{
		$pdo->mysql->beginTransaction();
	
		//$pst = $pdo->mysql->prepare("insert into usuario () values (120 ,'harold@camasf','11561dasd','activo','hhuhas','151156'");
	

		$pst = $pdo->mysql->prepare("insert into usuario() values(:id,:name,:lastname,:email,:password,:document, 'activo',:rol )");
		$id = $pdo->mysql->lastInsertId();

		$pst->bindParam(":document", $document, PDO::PARAM_STR);
		$pst->bindParam(":id", $id, PDO::PARAM_INT);
		$pst->bindParam(":lastname", $lastname, PDO::PARAM_STR);
		$pst->bindParam(":email", $email, PDO::PARAM_STR);
		$pst->bindParam(":password", $password, PDO::PARAM_STR);
		$pst->bindParam(":name", $name, PDO::PARAM_STR);
		$pst->bindParam(":rol", $rol, PDO::PARAM_INT);


		$pst->execute();
		$id = $pdo->mysql->lastInsertId();
		$pdo->mysql->commit();
	
		header("Location:../../view/mostrarusuario.html");
	}
	catch(PDOException $ex)
	{
		$pdo->mysql->rollback();
		echo $ex;

		echo "El usuario ya existe.";
		echo "<a href='#' onclick=javascript:window.history.back()>Regresar</a>"; 
		$HTTP_REFERER;
		//header("Location:".$_SERVER['HTTP_REFERER']); 
		echo "El usuario ya existe.";
	}


}