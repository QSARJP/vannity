<?php 

include "../../conexion.php";	

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!--scripts reutilizar-->
		<link rel="stylesheet" type="text/css" href="css/styleAdmin.css">
		<script type="text/javascript" src="functions2.php"></script>
		<!--scripts reutilizar-->
		<title>Lista de usuarios Vannity</title>
	</head>
	<body>
		
		<!-- el como hacer que nadie pueda acceder a la pag de dashboard sin haber iniciado sesion y que redireccione a la pag anterior-->
		<?php 
		session_start();
		if(empty($_SESSION['active'])){ //si no existe esa variable sesion activa
			header('location: ../echo.php'); //lleveme a esta direccion
		}
		?>
		<!-- si la sesion SI esta activa, haga todo esto -->
		
		<!--header reutilizar-->
		<header>
			<div class="header">
				<img src="img/logoBlancoPequ.png"> 
				<h4> &nbsp;&nbsp;ADMINISTRADOR</h4>
				<div class="optionsBar">
					<p>Colombia,2019</p>
					<span></span>
					<span class="user"><?php echo $_SESSION['user']?></span> 
					<!--ese php llama el nombre del usuario que inicio sesion-->
					<img class="photouser" src="img/user4.png" alt="Usuario">
					<a href="salir2.php"><img class="close" src="img/salirBlanco.png" alt="Salir del sistema" title="Salir"></a>
				</div>
			</div>
			<!--nav reutilizar-->
			<nav>
				<ul>
					<li><a href="dashboardAdminV2.php">Inicio</a></li>

					<li class="principal">
						<a href="#">Usuarios</a>
						<ul>
							<li><a href="registro_usuarioOK.php">Nuevo Usuario</a></li>
							<li><a href="lista_usuariosOK.php">Lista de Usuarios</a></li>
						</ul>
					</li>

					<li class="principal">
						<a href="#">Clientes</a>
						<ul>
							<li><a href="#">Nuevo Cliente</a></li>
							<li><a href="#">Lista de Clientes</a></li>
						</ul>
					</li>

					<!--AQUI IBA OTRO LI DE PROVEEDORES-->

					<li class="principal">
						<a href="#">Productos</a>
						<ul>
							<li><a href="#">Nuevo Producto</a></li>
							<li><a href="#">Lista de Productos</a></li>
						</ul>
					</li>

					<li class="principal">
						<a href="#">Facturas</a>
						<ul>
							<li><a href="#">Nueva factura</a></li>
							<li><a href="#">Facturas</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<!--nav reutilizar-->
		</header>
		<!--header reutilizar-->
<!-- 
----------------------------------------------------------
----------------------------------------------------------
------------ AQUI VA EL CONTENIDO DE ESTA PAGINA ---------
----------------------------------------------------------
----------------------------------------------------------
-->
		
		
		<section id="container">

			<h1>Lista de usuarios</h1>
			<a href="registro_usuarioOK.php" class="btn_new">Crear usuario</a>

			<form action="buscar_usuario.php" method="get" class="form_search">
				<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
				<input type="submit" value="IR" class="btn_search">
			</form>

			<table>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Usuario</th>
					<th>Rol</th>
					<th>Acciones</th>
				</tr>
								
				<?php 
				
						
				//para traer toda la info de un usuario se puede con select * from usuario, que trae todo de la tabla de usuario, pero en el campo de rol debe aparecer el nombre del rol, no el id del rol, por eso se hace un inner join 

				$query = mysqli_query($conection,"SELECT u.idusuario, u.nombre, u.correo, u.usuario, r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol");

				//mysqli_close($conection);

				$result = mysqli_num_rows($query);
				if($result > 0){

					while ($data = mysqli_fetch_array($query)) {

				?>
				<tr>
					<td><?php echo $data["idusuario"]; ?></td>
					<td><?php echo $data["nombre"]; ?></td>
					<td><?php echo $data["correo"]; ?></td>
					<td><?php echo $data["usuario"]; ?></td>
					<td><?php echo $data['rol'] ?></td>
					<td>
						<a class="link_edit" href="editarUsuarioOK.php?=<?php echo $data["idusuario"]; ?>">Editar</a>
						<!--en el href se coloca la pagina en la que esta el formulario de edicion, seguido del php que va a identificar el id del usuario a actualizar y asi solo se llega a la pagina de edicion para los datos del usuario seleccionado-->						
						|
						<a class="link_delete" href="#">Eliminar</a>
						
					</td>
				</tr>

				<?php 
					}

				}
				?>


			</table>
			


		</section>
		<!--php include "includes/footer.php"; ?>-->
	</body>
</html>