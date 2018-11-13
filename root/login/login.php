<?php
session_start();


	
function __getLogin__($user_name,$user_password)
{
	
	try
		{
			$connect = __getConnect__();
			
			
			echo "jestem tu kurwa" ;
			$stmt = $db->prepare("SELECT id FROM Users WHERE (user_name=:user_name and user_password=:user_password)"); 
			$stmt->bindParam("user_name", $user_name,PDO::PARAM_STR) ;
			$stmt->bindParam("user_password", $hash_password,PDO::PARAM_STR) ;
			$stmt->execute();
			$count=$stmt->rowCount();
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			$connect = null;
			
			
			if($count)
			{
			$_SESSION['id']=$data->id;
			
			echo " duało się " ;
			return true;
			}
			else
			{
			return false;
			} 
			
		}
	catch(Exception $error)
		{
		
		}
}



/*
try{
	
$connect = __getConnect__();


$obj = json_encode($connect);

echo $obj;

if ($obj->{'{outcome}'} == "true")
	{
		echo "udało się";
	}
	else 
	{
		echo "o niee :(";
	}
	
}catch(Exception $error){
	
}*/



?>

haval256