<?php
 /* //13.11.2018 m.sak
 ** global $name 
 sterowanie wyświetlanymi sekcjami z pliku master_page
 podawana jest na wejście nazwa pliku, która skojarzona jest ze zestawem includów z master_page
 */
 global $name;
?>
<!doctype html>
<html lang="pl">
   
	<body>
      <?php

	  $name="index";
	   
	  include ("master_page.php");
	  
	  ?>
   </body>
</html>