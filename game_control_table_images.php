<?
session_start();
include "config.php";
if(isset($_SESSION["user_name"]))
{
	$select = "SELECT id_personaje, personaje_activo FROM partida WHERE user_name =".$_SESSION["user_name"];
	$query = mysqli_query($con, $select);
	$rows = mysqli_num_rows($query);
	$cont = 0;
	$tableval;
	if($rows > 0)
	{
		while($row = mysqli_fetch_array($query))
		{
			if($row['personaje_activo'] = "T")
			{
				=$tableval."<td><img src=\"".$row['id_personaje']."\"></img></td>";
			}
			else
			{
				=$tableval."<td><img src=\"categoria/down.jpg\"></img></td>";
			}
			if($cont % 6 == 0 && $cont != 0) echo "<tr>".$tableval."</tr>"; 
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