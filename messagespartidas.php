<?
session_start();
include "config.php";
/**
*condicional que verifica que se halla iniciado sesion
*/
if(isset($_SESSION["user_name"]))
{
	/**
	*Variable que contiene la consulta a realizar en la base de datos
	*/
	$select = "SELECT * FROM chatpartida ORDER BY id DESC";
	/**
	*Consulta de la base de datos
	*/
	$query = mysqli_query($con, $select);
	/**
	*Variable que almacena el numero de columnas de la consulta
	*/
	$rows = mysqli_num_rows($query);
	/**
	*Condicional que verifica que hallan columnas
	*/
	$selectpartida = "SELECT DISTINCT id_partida FROM partida WHERE user_name = ".$_SESSION["user_name"];
	$querypartida = mysqli_query($con, $selectpartida);
	$rowspartida = mysqli_num_rows($querypartida);
	if($rows > 0)
	{
		while($row = mysqli_fetch_array($query))
		{
			if($rowspartida["id_partida"] = $rows["id_partida"])
			{
				?>
					<strong><?=$row['user_name']?></strong>: <?=$row['message']?><br>
				<?
			}	
		}
	}
	else
	{
		?>
		&nbsp;
		<?
	}
}
header('refresh:2, messagespartidas.php');
?>