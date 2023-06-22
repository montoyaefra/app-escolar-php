
<?php
session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION['id'])){
		header("Location: principal.php");
	}

	$nombre = $_SESSION['nombre'];
	

?>

<?php



if($_GET){ //delete
    $id = $_GET["id"];
    $objeConnection = new Connection();

    $sql = "DELETE FROM `clases` WHERE `id` = $id";
    $objeConnection->ejecutar($sql);
    header("Location:clases.php");
    exit;

}



?>
