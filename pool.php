<?php
session_start();
include "config.php";

if(isset($_POST['refresh'])  && isset($_SESSION['user_name'])){
    $user = $_SESSION['user_name'];
    $category="0";
 
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pool</title>
<script type="text/javascript">

     function ventana_reto(){
        window.open('reto.php','retos','width=420,height=240,top=200,left=200');
    } 
</script>
</head>

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
<body leftmargin="0" topmargin="0">
<form id="titulo" method="post" action="reto.php">
  <table width="605" align="left">  
        <tr>
        <th width="113">No. Partida</th>
        <th width="103">Username</th>
        <th width="141">Disponibilidad</th>
        <th width="208">Total partidas</th>
        </tr>  
        <?php 
         $category="1";
        $select = "SELECT * FROM pool WHERE id_categoria = ".$category."";
        if ($_POST['categoria']=="Actores") {
             
             $category="0";
             $select = "SELECT * FROM pool WHERE id_categoria = ".$category."";
        }
        if ($_POST['categoria']=="Jugadores") {
             
             $category="1";
             $select = "SELECT * FROM pool WHERE id_categoria = ".$category."";
        }
        if ($_POST['categoria']=="Simpsons") {
            
             $category="2";
             $select = "SELECT * FROM pool WHERE id_categoria = ".$category."";
        }
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

            <td><?=$row['id_partida']?></td>
            <td><input type="radio" name="reto" value="<?php echo $row['user_name'];?>"><?php echo $row['user_name'];?></td>
            <td><?=$row['estado']?></td>
            <td>22</td>
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
    <button type="submit" name="send">Enviar Reto</button> 
     <input type="text" name="mensaje" >
</form>
</body>
</html>


