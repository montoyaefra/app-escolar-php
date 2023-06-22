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

$sql = "SELECT * FROM maestros $where";
$resultado = $mysqli->query($sql);


if($_POST){
    $name=$_POST["nombre"];
    $email=$_POST["correo"];
    $address=$_POST["direccion"];
    $birthday=$_POST["nacimiento"];
    

    $objeConnection = new Connection;
    $sql="INSERT INTO `maestros` (`id`, `nombre`, `correo`, `direccion`, `nacimiento`) VALUES (NULL, '$name', '$email', '$birthday', '$address'); ";
    $objeConnection->ejecutar($sql);
    header("Location:maestros.php");
}




?>

<?php require "header.php"; ?>

<form action="newM.php" method="post" class="border border-3" class="m-2" >
<input type="text" name="nombre" placeholder="NOMBRE" class="m-2"><br>
<input type="text" name="correo" placeholder="CORREO" class="m-2"><br>
<input type="text" name="direccion" placeholder="DIRECCION" class="m-2"><br>
<input type="text" name="nacimiento" placeholder="NACIMIENTO" class="m-2"><br>

<input type="submit" value="CREAR" class="btb btn-info m-4" >

</form>


<? require "footer.php"; ?>