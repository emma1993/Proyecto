<?php
session_start();
include "config.php";
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Centro de Notificaciones</title>
<style type="text/css">
table,th,td
{
border:1px solid black;
border-collapse:collapse;
}
th{
    background-color: #E6E6E6;
    
}
</style>
<script type="text/javascript">
function reto(){
    window.open('validar_notificacion.php');
}
</script>
</head>
<body leftmargin="0" topmargin="0">
<form method="post" action="validar_notificacion.php">
	<table width="380" name="tabla_notificacion">
        <tr>
        <th>Tu usuario</th>
        <th width="80">Nombre Oponente</th>
        <th  width="150">Mensaje</th>
        </tr>
        <tr>
    <?php 
    $user_name=$_SESSION['user_name'];
    $select = "SELECT * FROM notificacion WHERE user_name_oponente='$user_name'";
     $query = mysqli_query($con, $select);
     $rows = mysqli_num_rows($query);
        if($rows > 0)
        {   
            while($row = mysqli_fetch_array($query))
            {
               
            ?>

            <tr>
            <td><?=$row['user_name_oponente'];?></td>
            <td><input type="radio" name="reto" value="<?php echo $row['user_name_retador'];?>"><?php echo $row['user_name_retador'];?></td>
            <td><?php echo $row['mensaje'];?></td>
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
     <input type="submit" name="btn_aceptar" value="Aceptar Reto">
    <input type="submit" name="btn_rechazar" value="Rechazar Reto">
</form>
 

</body>
</html>

