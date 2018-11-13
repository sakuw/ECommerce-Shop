<?php
session_start();

require ("root/login/root.php");

/*
// przykładowy test connectingu i zwrócenia wartości przez funkcję connectingu
// funkcja zwraca wartości w JSON.

$error = __getConnect__();
echo $error;

*/
?>

<!doctype html>
<html lang="pl">
   
	<body>
      <?php

			include ("header.php");
			include ("navbar.php");
			include ("main_content.php");
			include ("carousel.php");
			include ("content.php");
			include ("footer.php");
			include ("script.php");

			
			
	  ?>
   </body>
</html>