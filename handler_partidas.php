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
	$selectpartida = "SELECT DISTINCT id_partida FROM partida WHERE user_name = ".$_SESSION["user_name"];
	$querypartida = mysqli_query($con, $selectpartida);
	$rowspartida = mysqli_num_rows($querypartida);
	$insert = "INSERT INTO chatpartidas (user_name, message)";
	$insert.= "VALUES ('".$rowspartida['id_partida']."','".$user."','".$message."')";
	mysqli_query($con, $insert);
	header("Location: lobby.html");
}
?>