
	  <?php 

	  switch ($name)
	  {
		case "index":
		{
			include ("header.php");
			include ("navbar.php");
			include ("main_content.php");
			include ("carousel.php");
			include ("content.php");
			include ("footer.php");
			include ("script.php");
			
		break;
		}
		case "register_and_login":
		{
			include ("header.php");
			include ("navbar.php");
			include ("root/login/register_and_login.php");
			include ("script.php");
			include ("footer.php");
		break;
		}
		default:
		{
			include ("error.php");
		}
		 
	  }
	  ?>
