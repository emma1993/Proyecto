<?
session_start();
include "config.php";
if(isset($_SESSION["user_name"]))
{
	$selectcategory = "SELECT id_personaje FROM categoria WHERE id_categoria =".$_POST['id_categoria'];
	$query = mysqli_query($con, $select);
	$rows = mysqli_num_rows($query);
	$cont = 0;
	$tableval;
	if($rows > 0)
	{
		while($row = mysqli_fetch_array($query))
		{
			$insertmatchxcategory = "INSERT INTO partida(id_partida, id_personaje, user_name, id_categoria) VALUES(".$_POST['id_partida'].", ".$rows['id_personaje'].", ".$_SESSION["user_name"].", ".$_POST['id_categoria'].")";
			$insertquery = mysqli_query($con, $insertmatchxcategory);
		}
	}
	else
	{
		?>
		&nbsp;
		<?
	}
}
header('refresh:2, messages.php');
?>
