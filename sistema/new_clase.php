<?php session_start();?>
<?php
include "conexion.php";

if(!isset($_SESSION['id'])){
    header("Location: principal.php");
}

$nombre = $_SESSION['nombre'];

$id = $_SESSION['id'];
$tipo_usuario = $_SESSION['tipo_usuario'];

if($tipo_usuario == 1 ){
    $where = "";
    } else if($tipo_usuario == 2){
    $where = "WHERE id=$id";
}

$sql = "SELECT * FROM clases $where";
$resultado = $mysqli->query($sql);


if($_POST){
    $clase=$_POST["clase"];
  
    

    $objeConnection = new Connection;
    $sql="INSERT INTO `clases` (`id`, `clase`) VALUES (NULL, '$clase'); ";
    $objeConnection->ejecutar($sql);
    header("Location:clases.php");
}




?>

<?php require "header.php"; ?>

<form action="new_clase.php" method="post" class="border border-3" class="m-2" >
<input type="text" name="clase" placeholder="MATERIA" class="m-2"><br>


<input type="submit" value="CREAR" class="btb btn-info m-4" >

</form>


<? require "footer.php"; ?>