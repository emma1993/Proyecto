<?
session_start();
include "config.php";
if(isset($_SESSION["user_name"]))
{
	$select = "SELECT id_personaje FROM partida";
	$query = mysqli_query($con, $select);
	$rows = mysqli_num_rows($query);
	$cont = 0;
	if($rows > 0)
	{
		while($row = mysqli_fetch_array($query))
		{
			if($cont % 6 == 0) echo "<tr>" 
			if($row['personaje_activo'] = "T")
			{
				echo "<td><img src=\"".$row['id_personaje']."\"></img></td>"
			}
			else
			{
				echo "<td><img src=\"categoria/down.jpg\"></img></td>"
			}
			if($cont % 6 == 0) echo "</tr>" 
			$cont++;
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
