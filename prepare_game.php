<?
session_start();
    include "config.php";
    if(isset($_SESSION["user_name"]))
    {
      $selectcategoria = "SELECT DISTINCT id_partida, id_categoria FROM partida WHERE user_name =".$_SESSION["user_name"];
      $querycategoria = mysqli_query($con, $selectcategoria);
      $rowcategoria = mysqli_fetch_array($querycategoria);
      $personajenum = rand(0,23);
      $selectpersonaje = "SELECT nombre_personaje, foto_personaje FROM Categoria WHERE id_personaje =".$personajenum;
      $querypersonaje = mysqli_query($selectpersonaje);
      $rowpersonaje = mysqli_fetch_array($querypersonaje);
      $selectturno = "SELECT user_name_retador, user_name_oponente FROM notificacion WHERE user_name =".$_SESSION["user_name"];
      $queryturno = mysqli_query($con, $selectcategoria);

      if($_SESSION["user_name"] = $queryturno["user_name_oponente"]){
        $insertestado = "INSERT INTO estadojugador(id_partida, user_name, turno_activo, personaje_secreto) VALUES(".$rowcategoria['id_partida'].", ".$_SESSION["user_name"].", "."false".", ".$rowpersonaje["nombre_personaje"].")";
        mysqli_query($insertestado);
      }
      else
      {
        $insertestado = "INSERT INTO estadojugador(id_partida, user_name, turno_activo, personaje_secreto) VALUES(".$rowcategoria['id_partida'].", ".$_SESSION["user_name"].", "."true".", ".$rowpersonaje["nombre_personaje"].")";
        mysqli_query($insertestado);
      }
      echo "<img src=\"categorias/".$rowpersonaje["foto_personaje"]."\" width=\"240\" height=\"360\" style=\"display:block; margin: 0 auto;\"></img>";		
    }
}
?>