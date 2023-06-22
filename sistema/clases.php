<?php
session_start();
	require 'conexion.php';
	
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
	
    $sql = "SELECT * FROM clases $where ";
	$resultado = $mysqli->query($sql);

	$sql2 = "SELECT * FROM maestros $where";
	$resultado2 = $mysqli->query($sql2);

    $count=1;
	
	
?>

<<?php require "header.php"; ?>
				<main>
					<div class="container-fluid">
						<h1 class="mt-4">Lista de Alumnos</h1>
						<div class="card mb-4">
							<div  class="card-header"><i class="fa-solid fa-graduation-cap"></i> Informacion de Materias</div>
							<div>
							<a href="new_clase.php" class="btn btn-info w-25 ms-4"  >Agregar Materia</a> 
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>#</th>
												<th>clases</th>
												<th>alumnos inscritos</th>
                                                <th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php while($row = $resultado->fetch_assoc()) { ?>
												
												<tr>
													<td><?php echo $count++; ?></td>
													<td><?php echo $row['clase']; ?></td>
													<td><?php
													 $randomNumber = rand(1, 7); 
													 echo $randomNumber;
													?>
													</td>
													<td><a href="##"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="updClase.php?id=<?= $row['id'] ?>" class="ps-2" style="color: red;"><i class="fa-solid fa-trash-can"></i></></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
								</div>
								</div>
											</div>
					</main>
			
					


<?php require "footer.php"; ?>					