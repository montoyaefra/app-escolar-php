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
	
    $sql = "SELECT * FROM alumnos $where ";
	$resultado = $mysqli->query($sql);

    
	
	$count=1;
?>

<<?php require "header.php"; ?>
				<main>
					<div class="container-fluid">
						<h1 class="mt-4">Lista de Alumnos</h1>
						<div class="card mb-4">
							<div  class="card-header"><i class="fa-solid fa-graduation-cap"></i> Informacion de alumnos</div>
                            <div>
                            <a href="newE.php" class="btn btn-info ms-4" >Agregar Alumno</a> 
                            </div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>#</th>
												<th>DNI</th>
												<th>Nombre</th>
												<th>Correo</th>
												<th>Direccion</th>
                                                <th>F. Nacimiento</th>
                                                <th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php while($row = $resultado->fetch_assoc()) { ?>
												
												<tr>
													<td><?php echo $count++; ?></td>
													<td><?php echo $row['dni']; ?></td>
													<td><?php echo $row['name']; ?></td>
													<td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['address']; ?></td>
                                                    <td><?php echo $row['birthday']; ?></td>
													<td><a href="editE.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="updatet.php?id=<?= $row['id'] ?>" class="ps-2" style="color: red;" onclick="alert('¿Estás seguro de eliminar?');"><i class="fa-solid fa-trash-can"></i></a></td>
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

