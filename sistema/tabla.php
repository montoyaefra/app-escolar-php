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
	
	$sql = "SELECT * FROM maestros $where";
	$resultado = $mysqli->query($sql);
	
	$sql2 = "SELECT * FROM alumnos $where";
	$resultado2 = $mysqli->query($sql2);
	
	$i=1;
	$i2=1;

?>

<<?php require "header.php"; ?>
				<main>
					<div class="container-fluid">
						<h1 class="mt-4">Permisos</h1>
						<div class="card mb-4">
							<div class="card-header"><i class="fa-solid fa-id-card"></i> Informacion de permisos</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>#</th>
												<th>Email/ Usuario</th>
												<th>Permiso</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php while($row = $resultado->fetch_assoc()) { ?>
												
												<tr>
													<td><?php echo $i++ ?></td>
													<td><?php echo $row['correo']; ?></td>
													<td><?php echo $row['tipo_usuario']; ?></td>
													<td><span class="btn btn-success">Activo</span></td>
													<td><a href="##"><i class="fa-solid fa-pen-to-square"></i></a></td>
												</tr>
											<?php } ?>
											<?php
							while($row = $resultado2->fetch_assoc()) {
								?>
								<tr>
									<td><?php echo $i2++; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['tipo_usuario']; ?></td>
									<td><span class="btn btn-danger">Desactivo</span></td>
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

