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

$sql = "SELECT * FROM alumnos $where";
$resultado = $mysqli->query($sql);


if($_POST){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $dni=$_POST["dni"];
    $address=$_POST["address"];
    $birthday=$_POST["birthday"];
    

    $objeConnection = new Connection;
    $sql="INSERT INTO `alumnos` (`id`, `dni`, `name`, `email`, `address`, `birthday`) VALUES (NULL, '$dni', '$name', '$email', '$birthday', '$address'); ";
    $objeConnection->ejecutar($sql);
    header("Location:alumnos.php");
}




?>

<?php require "header.php"; ?>

<form action="newE.php" method="post" class="border border-3" class="m-2" >
<input type="text"  name="dni" placeholder="DNI" class="m-2"> <br>
<input type="text" name="name" placeholder="NOMBRE" class="m-2"><br>
<input type="text" name="email" placeholder="CORREO" class="m-2"><br>
<input type="text" name="address" placeholder="DIRECCION" class="m-2"><br>
<input type="text" name="birthday" placeholder="NACIMIENTO" class="m-2"><br>

<input type="submit" value="CREAR" class="btb btn-info m-4" >

</form>


<? require "footer.php"; ?>