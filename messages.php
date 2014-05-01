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
	$select = "SELECT * FROM chatlobby ORDER BY id DESC";
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
	if($rows > 0)
	{
		while($row = mysqli_fetch_array($query))
		{
			?>
			<strong><?=$row['user_name']?></strong>: <?=$row['message']?><br>
			<?
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