<?php
session_start();
include "config.php";
if(isset($_POST['categoria']) && isset($_SESSION['user_name'])){
	$user = $_SESSION['user_name'];
	$category = $_POST['categoria'];
	$select = "SELECT * FROM pool WHERE id_categoria = ".$category."";
	$query = mysqli_query($con, $select);
	$rows = mysqli_num_rows($query);
	if($rows > 0)
	{
		while($row = mysqli_fetch_array($query))
		{
			?>
			<tr>
  			<td><?=$row['id_partida']?></td>
  			<td><?=$row['user_name']?></td>		
  			<td><?=$row['estado']?></td>
			</tr>
			<?
		}
	}
	else
	{
		?>
		&nbsp;
		<?
	}
	header("Location: lobby.html");
}
?>
