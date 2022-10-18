 <?php

 if ($_GET)
 {
 	try
 	{
 		require("../../model/mysql.php");
 		$pdo = new db();
 		$pdo->mysql->beginTransaction();
 		$id = $_GET["id"];
 		$pst = $pdo->mysql->prepare("delete from usuario where id_Usuario= :id");
		$pst->bindParam(":id", $id, PDO::PARAM_STR);
		$pst->execute();
		$pdo->mysql->commit();
		header("Location:../../view/layout/layout.php?menu=mostrarusuario");
 	}
 	catch(PDOException $ex)
 	{
 		echo "El usuario no pudo ser eliminado.";
 		$pdo->mysql->rollback();
 	}

 }
 
 