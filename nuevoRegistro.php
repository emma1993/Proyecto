<?php
/**
* Representa la conexion a la base de datos 
*/
	$con=mysqli_connect("orion.javeriana.edu.co","guesswho","SyiQKoDdospzyg","guesswho");
	// VARIABLES PARA EL INSERT COGIDAS DESDE EL METODO POST
/**
*Representa el nickname de usuario que han enviado
*/
	$user_name = $_POST["newuser"];
/**
*Representa la contrasena de usuario que han enviado
*/
	$password=$_POST["newpassword"];
/**
*Representa el nombre del usuario que han enviado
*/
	$nameuser=$_POST["nameuser"];
/** 
*Representa el correo del usuario que han enviado
*/
	$email=$_POST["email"];
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// BUSCAR QUE NO SE REPITAN LOS USUARIOS Y MOSTRAR EL MENSAJE QUE SI YA EXISTE EL USER_NAME QUE ELIGA OTRO
/** 
*Representa si un nickname ya existe
*/
	$repetido="no";
/**
*Representa el resultado de una consulta de todos los usuarios en la base de datos
*/
	$result = mysqli_query($con,"SELECT * FROM usuario"); 
/**
*Ciclo que verifica si ya existe el nickname
*/

	while($row = mysqli_fetch_array($result)) {
		if ($user_name==$row['user_name']) {
		 	$repetido="si";
		 } 
	} 

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
*Condicion que muestra el flujo en caso de que se pueda registrar un nuevo usuario o no
*/
	if(isset($_POST["sub_btn"])&& $user_name!=""&& $password!="" && $email!="" && $repetido=="no"){
		$sql=mysqli_query($con,"INSERT INTO usuario (user_name,password,nombre_usuario,email) VALUES ('{$user_name}','{$password}','{$nameuser}','{$email}')");
		header("Location: registro_exitoso.html");
	}elseif( $repetido=="si") {
		header("Location: register.html?error=si");
	}
	mysql_close($con);
?>