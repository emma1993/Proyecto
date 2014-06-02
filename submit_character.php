<?php
  session_start();
  include "config.php";
  if(isset($_SESSION["user_name"]) && isset($_POST["nombre_personaje"]))
  {
      $selectpartida = "SELECT DISTINCT id_partida FROM partida WHERE user_name = ".$_SESSION["user_name"];
      $querypartida = mysqli_query($con, $selectcategoria);
      $selectpersonaje = "SELECT personaje_secreto FROM estadojugador WHERE id_partida = ".$querypartida["id_partida"]." AND user_name != ".$_SESSION["user_name"];
      $querypersonaje = mysqli_query($selectpersonaje);

      if($querypersonaje["personaje_secreto"] == $_POST["nombre_personaje"]){
        $selectpuntaje = "SELECT puntaje FROM estadojugador where user_name = ".$_SESSION["user_name"];
        $querypuntaje = mysqli_query($con, $selectpuntaje);
        $updatepuntaje = "UPDATE usuario SET puntaje_total = puntaje_total + ".$querypuntaje["puntaje"]." WHERE user_name = ".$_SESSION["user_name"];
        $updatepartidas = "UPDATE usuario SET partidas_jugadas = partidas_jugadas + 1 WHERE user_name = ".$_SESSION["user_name"];
        $deleteestado
        $deletepartida = "DELETE FROM partida WHERE id_partida = ".$querypartida["id_partida"];
      }else{

      }
  } 
  echo $tableval;
?>