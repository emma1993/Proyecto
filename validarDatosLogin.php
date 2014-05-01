
<?php
	session_start();
	include "config.php";
	/**
	*Representa la consulta de la tabla usuario en donde se guardan sus atributos
	*/
	$result = mysqli_query($con,"SELECT * FROM usuario"); 
	/** 
	*Ciclo que valida que los datos del usuario esten dentro de la base de datos
	*/
	while($row = mysqli_fetch_array($result)) {
		if ($_POST["user_txt"]==$row['user_name']) {
		 	$res_nombre=$row['user_name'];
		 	$_SESSION['user_name'] = $row['user_name'];
		 	$_SESSION['password']=$row['password'];
		 	$_SESSION['nombre_usuario']=$row['nombre_usuario'];
		 	$_SESSION['email']=$row['email'];
		 } 
		 if ($_POST["pass_txt"]==$row['password']) {
		 	$res_password=$row['password'];
		 }
		 	
	}
	/**
	* Condicion que muestra el flujo en caso de ingreso exitoso o no
	*/ 
	if (isset($_POST["submit_btn"])) {
		if($res_nombre!= null && $res_password!=null){
			header("Location: exito.html");
		}else{
			header("Location: index.html?error=si");
		}
	}

?>