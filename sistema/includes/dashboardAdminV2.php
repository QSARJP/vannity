
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">

		<!--scripts reutilizar-->
		<link rel="stylesheet" type="text/css" href="css/styleAdmin.css">
		<script type="text/javascript" src="functions2.php"></script>
		<!--scripts reutilizar-->

		<title>Sistema Administrativo Ventas</title>

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
					<li><a href="#">Inicio</a></li>

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
			<h1>Bienvenido al sistema</h1>
		</section>

		<!-- include "footer.php"?> -->
	</body>
</html>