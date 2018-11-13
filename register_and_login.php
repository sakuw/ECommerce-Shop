<?php
session_start();

require ("root/login/root.php");
require ("root/login/login.php");

?>
<!doctype html>
<html lang="pl">
   
	<body>
      <?php

			include ("header.php");
			include ("navbar.php");
	  ?>	
			
			<div class="container top20 bottom100 border-login-register">
				<div class="row zero">
					<div class="col-sm-4">
						<div class="login-text top100">LOGOWANIE</div>
						
							<div class="container">
							
							
							<?php
							
							if (!empty($_POST['login_submit'])) 
							{
								
								echo "kliknęło się";
								echo $user_name=$_POST['user_name'];
								echo $user_password=$_POST['user_password'];
								
								
								$id=$__getLogin__($usernameEmail,$password);
								
								echo $id;
								if($id)
								{
								$url=BASE_URL.'home.php';
								header("Location: $url"); // Page redirecting to home.php 
								}		
								else {
									
									echo " ty chuju ";
								}
							}
							
							?>
							
								<form class="form-login top100" method="post" name="login" action="root/login/login.php">
								 
									 <div class="form-group">
										<label for="UserName">Nazwa użytkownika:</label>
										<input type="text" class="form-control" id="user_name" placeholder="Wpisz nazwę użytkownika...">
										<span class="float-right">Zapomniałem hasła :(</span>
									</div>
									
									<div class="form-group">
										<label for="UserPassword">Hasło:</label>
										<input type="password" class="form-control" id="user_password" placeholder="Wpisz swoje hasło...">
									</div>

								 
									<div class=" form-group row float-right zero">
									<button style="min-width:60%;" id="login_submit" type="submit" class="btn btn-primary float-right">Zaloguj się</button>
									</div>
								</form>
							</div>
						
					</div>
					<div class="col-sm-2">
					
						<div class="register-line top20 bottom20"></div>
					
					</div>
					<div class="col-sm-6">
						<div class="register-text top100">REJESTRACJA</div>
						
						<div class="container">
								<form class="form-login top100">
								 
									 <div class="form-group">
										<label for="UserName">Nazwa użytkownika:</label>
										<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Wpisz nazwę użytkownika...">
										
									</div>
									
									<div class="form-group">
										<label for="UserPassword">Hasło:</label>
										<input type="password" class="form-control" id="exampleInputEmail1" placeholder="Wpisz swoje hasło...">
									</div>
									
									<div class="form-group">
										<label for="UserPassword2">Powtórz hasło:</label>
										<input type="password" class="form-control" id="exampleInputEmail1" placeholder="Wpisz ponownie swoje hasło...">
									</div>
								 
								 
									<div class="form-group">
										<label for="PhoneNumber">Nr Telefonu:</label>
										<input type="tel"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" class="form-control" id="exampleInputEmail1" placeholder="Wpisz numer telefonu...">
										<span>Format: 000-000-000</span>
									</div>
									
									<div class="form-group">
											<label for="PhoneNumber">Adres zamieszkania:</label>
											<input type="text" pattern="" class="form-control" id="exampleInputEmail1" placeholder="Wpisz adres zamieszkania">
									</div>
									
									
									<div class="form-group">
											<label for="PhoneNumber">Kod pocztowy:</label>
											<input type="text" pattern="[0-9]{2}-[0-9]{3}" class="form-control" id="exampleInputEmail1" placeholder="Wpisz kod pocztowy">
									</div>
								 
								 <div class="form-group row float-right zero bottom20">
									<button style="min-width:60%;" type="submit" class="btn btn-primary float-right">Zarejestruj się</button>
								</div>
								
								
								</form>
							</div>
						
					</div>
				</div>
				
			
			</div>
			
			
	  <?php	
			include ("footer.php");
			include ("script.php");
	  ?>
	 
   </body>
</html>