<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Cliente </title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/estiloInicioSesCliente.css">
	<link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    
</head>
	
<body>
	  
<div class="contenedorFormulario">
        <div class="header">
            <div class="logo-title">
                <a href="indexVannity.html"><img src="imgs/logoVannityBlanco.png" alt=""></a>
                
            </div>
            <div class="menu">
                <a href="login.php"><li>Inicia Sesión</li></a>
                <a href="register.php"><li>Registrate</li></a>
				<a href="indexVannity.html"><li>Home</li></a>
            </div>
        </div>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="formulario">
            <div class="formularioBienvenida"><h1 class="porfa">PORTAL CLIENTES</h1></div>
            <div class="input nombre usuario">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre Usuario" name="usuario">
            </div>
            <div class="input contrasena usuario">
                <label></label>
                <input type="password" placeholder="Contraseña" name="clave">
            </div>
            
             <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <button type="submit">Entrar<label class="lnr lnr-chevron-right"></label></button>
        </form>
    </div>
    
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>