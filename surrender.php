<?php
session_start();
include "config.php";
// buscar el id de mi partida
$selectpartida = "SELECT DISTINCT id_partida FROM partida WHERE user_name =".$_SESSION["user_name"];
$querypartida = mysqli_query($con, $selectpartida);
$rowpartida = mysqli_fetch_array($querypartida);
$partida=$rowpartida['id_partida'];
$selectuser = "SELECT user_name FROM estadojugador WHERE user_name !=".$_SESSION["user_name"]."AND id_partida = $partida";
$queryuser = mysqli_query($con, $selectuser);
$rowsuser = mysqli_num_rows($queryuser);
$ganador=$rowyser['user_name'];
$insertpoints="UPDATE usuario
        SET puntaje_total=100
        WHERE user_name='$ganador'";
$delete = "DELETE FROM estadojugador WHERE user_name =".$_SESSION["user_name"];
$query = mysqli_query($con, $delete);
$deletepartida = "DELETE FROM Partida WHERE user_name =".$_SESSION["user_name"];
$querypartida = mysqli_query($con, $select);
header("Location: menu.html");
?>