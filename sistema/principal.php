<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
	
?>

<?php 
require "header.php";
?>



<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
         <ol class="breadcrumb mb-4 bg-white" style="display: inline-block;">
            <li>Bienvenido</li>
            <li>Seleciona la accion que quieras realizar en las pestañas del menu de las izquierda</li>
		</ol>
    </div>        
</main>



<?php 
 require "footer.php";
 ?>         
                
