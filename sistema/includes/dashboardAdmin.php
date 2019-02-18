
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/functions.js"></script>
	<title>Sistema Administrativo Ventas</title>

</head>
	
<body>
	
<!-- el como hacer que nadie pueda acceder a la pag de dashboard sin haber iniciado sesion y que redireccione a la pag anterior, no funiono< tut Configurar plantilla con PHP - 16 min +- 12-->

	
	<header>
	<div class="header">
		<h1>Sistema Facturaci</h1>
		<div class="optionsBar">
		<p>Colombia,2019</p>
			<span></span>
			<span class="user"><?php echo $_SESSION['user']?></span>
			<img class="photouser" src="img/user.png" alt="Usuario">
			<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
		</div>
	</div>
    <nav>
		<ul>
		<li><a href="#">Inicio</a></li>
			
		<li class="principal">
			<a href="#">Usuarios</a>
			<ul>
			<li><a href="#">Nuevo Usuario</a></li>
			<li><a href="#">Lista de Usuarios</a></li>
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
	</header>
	
	
	<section id="container">
		<h1>Bienvenido al sistema</h1>


	</section>
	
</body>
</html>