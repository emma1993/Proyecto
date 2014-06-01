<?php
session_start();
include "config.php";
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
	<title>Ranking</title>
<style type="text/css">
#rankingbox{

	position:fixed;

	display:table;

    border-collapse: collapse;

	width: 400px;

	height: 500px;

	border-radius: 9px;

	padding: 0.5em;

	background: rgba(0,0,0,.5);

	margin-top:80px;

	margin-bottom:100px;

	margin-right:50px;

	margin-left:590px;

}
label{
	font-family: "Times New Roman", Times, serif;

	font-weight: bold;

	display: block;

	font-size: 40px;

	color: #F00;

	text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;

}
table,th,td
{
border:1px solid black;
border-collapse:collapse;
}
th{
    background-color: #E6E6E6;
    
}
#volver_menu{
	margin-top: 42em;
	margin-left: 2em;
}

a{
	font-size: 1.5em;
	text-decoration: underline;
}
a:visited {
	color:#FFFFFF;
}

</style>
</head>
<body background="imagen.jpg" >

<label align="center">Ranking GuessWho</label>
<form id="rankingbox">
<table width="380" align="center">
	<tr>
	<th width="80">Usuario</th>
	<th width="80">Partidas Jugadas</th>
	<th width="80">Puntuacion</th>
	</tr>
	<?php
	$select = "SELECT * FROM usuario";

	$query = mysqli_query($con, $select);
	
    ?>
    <?php
        $rows = mysqli_num_rows($query);
       
        if($rows > 0)
        {
            while($row = mysqli_fetch_array($query))
            {
            ?>
            <tr>
            <td><?=$row['user_name']?></td>
            <td><?=$row['partidas_jugadas']?></td>
            <td><?=$row['puntaje_total']?></td>
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
        ?>
</table>
</form>
<div id="volver_menu">
	<a  href="menu.html">Volver al Menu</a>
	</div>
</body>
</html>