<?php 
	
	$host = "localhost";
$dbusername = "saratd95";
$dbpassword = "sara1695";
$dbname = "TiendaOnlineVannity";
	
// Create connection
$conection = new mysqli ($host, $dbusername, $dbpassword, $dbname);;

	if(!$conection){
		echo "Error en la conexión";
	}

?>