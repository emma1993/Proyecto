<?php
session_start();
include "config.php";
/**
*Este condicional representa que si ya se envio un mensaje en el chat, se guarda en la base de datos del chat y se dirige a lobby
*/
if(isset($_POST['send'])){
	/**
	*Representa el usuario que esta registrado durante esa sesion
	*/
	$user = $_SESSION['user_name'];
	/**
	*Representa el mensaje que es enviado 
	*/
	$message = $_POST['message'];
	/**
	*Representa la insercion dentro de la tabla del chat en la base de datos
	*/
	$insert = "INSERT INTO chatlobby (user_name, message)";
	$insert.= "VALUES ('".$user."','".$message."')";
	mysqli_query($con, $insert);
	header("Location: lobby.html");
}
?>