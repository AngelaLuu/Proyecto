 <?php

 if ($_GET)
 {
 	try
 	{
 		require("../../model/mysql.php");
 		$pdo = new db();
 		$pdo->mysql->beginTransaction();
 		$id = $_GET["id"];
 		$pst = $pdo->mysql->prepare("delete from cliente where id = :id");
		$pst->bindParam(":id", $id, PDO::PARAM_STR);
		$pst->execute();
		$pdo->mysql->commit();
		header("Location:../../view/layout/layouts/layout.php?menu=mostrarcliente");
 	}
 	catch(PDOException $ex)
 	{
 		echo "El cliente no pudo ser eliminado.";
 		$pdo->mysql->rollback();
 	}

 }