<?php

if ($_POST)
{
	require("../../model/mysql.php"); 
	$pdo = new db();
	$id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
    $documento = $_POST["documento"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$rol = $_POST["rol"];
    $password = $_POST["password"];
	$estado = $_POST["estado"];
	#usuario

	$usuario = $_POST["usuario"];
	$clave = $_POST["clave"];

	try
	{
		$pdo->mysql->beginTransaction();

		$pst = $pdo->mysql->prepare("insert into Amdministrador_Empleado() values(:id,:nombre,:apellido,:documento, :correo,:telefono,:rol,:password, :estado)");
		$pst->bindParam(":id", $id, PDO::PARAM_INT);
		$pst->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$pst->bindParam(":apellido", $apellido, PDO::PARAM_STR);
        $pst->bindParam(":documento", $documento, PDO::PARAM_STR);
        $pst->bindParam(":correo", $correo, PDO::PARAM_STR);
		$pst->bindParam(":telefono", $telefono, PDO::PARAM_STR);
		$pst->bindParam(":rol", $rol, PDO::PARAM_STR);
        $pst->bindParam(":password", $password, PDO::PARAM_STR);
		$pst->bindParam(":estado", $estado, PDO::PARAM_STR);

		$pst->execute();
		$pdo->mysql->commit();

		$pdo->mysql->beginTransaction();
		$pst2 = $pdo->mysql->prepare("insert into usuario() values(:id,:perfil,:usuario,:clave)");
		$pst2->bindParam(":id", $id, PDO::PARAM_STR);
		$pst2->bindParam(":usuario", $usuario, PDO::PARAM_STR);
		$pst2->bindParam(":clave", $clave, PDO::PARAM_STR);

		$pst2->execute();
		$pdo->mysql->commit();	

		header("Location:../../view/layout/layouts/layout.php?menu=mostrarempleado");	
	}
	catch(PDOException $ex)
	{
		$pdo->mysql->rollback();
		echo "El empleado no pudo ser guardado.";
		echo "<a href='#' onclick=javascript:window.history.back()>Regresar</a>"; 
	}

}