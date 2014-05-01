<?php
session_start();
include "config.php";
/**
*Condicional que verifica que se halla iniciado sesion
*/
if(isset($_SESSION['user_name']))
{
	header("Location: lobby.html");
}else{
?>
	Usted no posee autorizacion para acceder a esta pagina <a href="http://orion.javeriana.edu.co/~guesswho/">Click aqui para ingresar a Guess who?</a>			
<?php
}
?>
}

