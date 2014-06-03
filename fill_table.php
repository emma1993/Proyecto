<?
session_start();
include "config.php";
if(isset($_SESSION["user_name"]))
{
<<<<<<< HEAD
$selectcategory = "SELECT id_personaje, nombre_personaje FROM categoria WHERE id_categoria =".$_SESSION['categoria'];
$query = mysqli_query($con, $select);
$rows = mysqli_num_rows($query);
$cont = 0;
if($rows > 0)
{
while($row = mysqli_fetch_array($query))
{
$insertmatchxcategory = "INSERT INTO partida(id_partida, nombre_personaje, id_personaje, user_name, id_categoria) VALUES(".$_POST['id_partida'].", ".$rows['nombre_personaje'].", ".$rows['id_personaje'].", ".$_SESSION["user_name"].", ".$_POST['id_categoria'].")";
$insertquery = mysqli_query($con, $insertmatchxcategory);
}
}
else
{
?>
&nbsp;
<?
}
header("Location: game_control_table_images.php")
}
?>
=======
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
header('Location:');
?>
>>>>>>> 2d3fe141ddaaa1697dd6aa2c22bbdc72064854fc
