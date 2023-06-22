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
	
    $sql = "SELECT * FROM maestros $where ";
	$resultado = $mysqli->query($sql);
	
	
?>

<<?php require "header.php"; ?>
				<main>
					<div class="container-fluid">
						<h1 class="mt-4">Lista de Maestros</h1>
						<div class="card mb-4">
							<div class="card-header"><i class="fa-solid fa-person-chalkboard"></i> Informacion de maestros</div>
							<div>
                            <a href="newM.php" class="btn btn-info ms-4" >Agregar Maestro</a> 
                            </div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>#</th>
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
													<td><?php echo $row['id']; ?></td>
													<td><?php echo $row['nombre']; ?></td>
													<td><?php echo $row['correo']; ?></td>
                                                    <td><?php echo $row['direccion']; ?></td>
                                                    <td><?php echo $row['nacimiento']; ?></td>
													<td><a href="##"><i class="fa-solid fa-pen-to-square"></i></a></td>
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