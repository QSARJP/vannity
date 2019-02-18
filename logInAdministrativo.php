<?php 

$alert = ''; 
session_start();

if(!empty($_SESSION['active'])){ //if para verificar sesion activa
	header('location:sistema/includes/dashboardAdminV2.php');
}else{

	if(!empty($_POST))
	{
		if(empty($_POST['usuario']) || empty($_POST['clave']))
		{
			$alert = 'Ingrese su usuario y su clave';
		}else{

			require_once "conexion.php";

			$user = $_POST['usuario'];
			$pass = $_POST['clave'];

			$query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario= '$user' AND clave = '$pass'");
			//mysqli_close($conection);
			$result = mysqli_num_rows($query);

			if($result > 0)
			{
				$data = mysqli_fetch_array($query);
				//session_start();
				$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['idusuario'];
				$_SESSION['nombre'] = $data['nombre'];
				//$_SESSION['email']  = $data['email'];
				$_SESSION['user']   = $data['usuario'];
				$_SESSION['rol']    = $data['rol'];

				//echo "Hola mundo ya se lego el usuario";
				header('location:sistema/includes/dashboardAdminV2.php');
			}else{
				$alert = 'El usuario o la clave son incorrectos';
				session_destroy();
			}


		}

	} //cierra if grande
 } // cierra if de identificar si hay sesion activa o no
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login Administrativo| Vannity</title>
		<link href="css/estiloPorFavor.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<section id="container">

			<form action="" method="post">

				<h3>Iniciar Sesión</h3>
				<img src="imgs/login.png" alt="Login">

				<input type="text" name="usuario" placeholder="Usuario">
				<input type="password" name="clave" placeholder="Contraseña">
				<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
				<input type="submit" value="INGRESAR">

			</form>

		</section>
	</body>
</html>