<?php 

include "../../conexion.php";

if(!empty($_POST))
{
	$alert='';
	if(empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['rol']))
	{
		$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
	}else{

		$nombre = $_POST['nombre'];
		$email  = $_POST['correo'];
		$user   = $_POST['usuario'];
		$clave  = $_POST['clave']; // le quite el md5
		$rol    = $_POST['rol'];

		//Para que no se creen dos usuarios con el mismo nombre o con el mismo correo, verificar en la BD si hay uno identico
		$query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario = '$user' OR correo = '$email' ");
		//mysqli_close($conection);
		//lo que encuentre la variable $query lo va a colocar en un arreglo con lo siguiente
		$result = mysqli_fetch_array($query);
		// si el recultado de la busqueda es mayor a 0, significa que ya el nombre de usuario o el correo ya existen en la base de datos y se manda un mje de error
		if($result > 0){
			$alert='<p class="msg_error">El correo o el usuario ya existe.</p>';
		}else{
			//si el resultado da cero, entonces proceda a guardar la info del nuevo usuario
			$query_insert = mysqli_query($conection,"INSERT INTO usuario(nombre,correo,usuario,clave,rol) VALUES('$nombre','$email','$user','$clave','$rol')");

			if($query_insert){ //si se inserto el usuario nuevo muestre un mje
				$alert='<p class="msg_save">Usuario creado correctamente.</p>';
			}else{ // si no se inserto elusuario nuevo, mje error
				$alert='<p class="msg_error">Error al crear el usuario.</p>';
			}

		}


	}

}// cierra el if grande
?> <!--ciera php -->


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!--scripts reutilizar-->
		<link rel="stylesheet" type="text/css" href="css/styleAdmin.css">
		<script type="text/javascript" src="functions2.php"></script>
		<!--scripts reutilizar-->

		<title>Editar Usuario</title>
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
						<a href="registro_usuarioOK.php">Usuarios</a>
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

			<div class="form_register">
				<h2 id="tituloTabla">Actualización de Usuario Administrativo</h2>
				<hr>
				<div class="alert">
					<?php echo isset($alert) ? $alert : ''; ?>
					<!--este php muestra mje de error o de que ya se registro el usuario nuevo segun la variable $alert que fue creada en el php de arriba al inicio del documento-->
				</div>

				<form action="" method="post">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" id="nombre" placeholder="Nombre completo">
					<label for="correo">Correo electrónico</label>
					<input type="email" name="correo" id="correo" placeholder="Correo electrónico">
					<label for="usuario">Usuario</label>
					<input type="text" name="usuario" id="usuario" placeholder="Usuario">
					<label for="clave">Clave</label>
					<input type="password" name="clave" id="clave" placeholder="Clave de acceso">
					<label for="rol">Tipo Usuario</label>

					<!--Para que las opciones de rol salgan tal cual como estan en la base de datos, se debe llamar desde la BD-->
					<?php 
					$query_rol = mysqli_query($conection,"SELECT * FROM rol");

					$result_rol = mysqli_num_rows($query_rol);
					?> <!--este php extrae los roles de la bd-->

					<select name="rol" id="rol">
						<?php 
						if($result_rol > 0)
						{
							while ($rol = mysqli_fetch_array($query_rol)) {
						?>
						<option value="<?php echo $rol["idrol"]; ?>"><?php echo $rol["rol"] ?></option>
						<?php 
							# code...
							}
						}
						?>
						<!--Si no se usara todo este php se podria colocar lo siguiente sin que los textos de rol fueran los mismos de la base de datos <option value="1">Administrador</option><option value="2">Vendedor</option>-->
					</select>

					<input type="submit" value="Actualizar  usuario" class="btn_save">

				</form>


			</div>


		</section>
		<!--php include "includes/footer.php"; ?>-->
	</body>
</html>