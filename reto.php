<?php
session_start();
include "config.php";
if(isset($_POST['send'])){
$sql=mysqli_query($con,"INSERT INTO notificacion(user_name_retador,user_name_oponente,mensaje) values ('{$_POST['reto']}','eneiza','{$_POST['mensaje']}')");
header("location: pool.php");
}
?>
