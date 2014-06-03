<?php
session_start();
include "config.php";

if (isset($_POST['btn_aceptar'])){
	header("Location: tablero/game.html");
}
if (isset($_POST['btn_rechazar'])) {
	# quitar de la tabla el usuario del reto  y ademas notificar que su reto a sido rechazado
	echo $_POST['reto'];
	$oponente=$_POST['reto'];
	$select = "DELETE FROM notificacion WHERE user_name_retador='$oponente'";
	$query = mysqli_query($con, $select);
	header("Location: notificaciones.php");
}
?>