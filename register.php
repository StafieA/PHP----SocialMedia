
<?php

 require 'config/config.php';
 require 'includes/form_handlers/register_handler.php';
 require 'includes/form_handlers/login_handler.php';
 


?>


<!DOCTYPE html>
<html>
<head>


	
	<title>Stafie ##Social-Media</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css?v=2">
</head>
<body>
 	

 	<div class="wrapper">

 		<div class="login_box">
 			<div class="login_header">
 			<h1>Let's socialize</h1>
 			Login or sign up below!
 			
 		</div>
	     <form action="register.php" method="POST">

	 			<input type="email" name="log_email" placeholder="Email Address" value="<?php
				if (isset($_SESSION['log_email'])) {
					 echo $_SESSION['log_email'];
				}
				?>" required>
	 			<br>
	 			<input type="password" name="log_password" placeholder="Password">
	 			<br>
	 			<input type="submit" name="login_button" value="Login">
	            <br>
	 			<?php if(in_array("Email or password was incorect<br>",$error_array)){
	 				echo "Email or password was incorect<br>";
	 			}
	 			?>
	     </form>	





		<form action="register.php" method="POST">
			<input type="text" name="reg_fname" placeholder="First Name" value="<?php
				if (isset($_SESSION['reg_fname'])) {
					 echo $_SESSION['reg_fname'];
				}
				?>"required>
			<br>
			
			<?php if(in_array("Your First Name must be between 2 and 25 chracaters<br>", $error_array)) echo "Your First Name must be between 2 and 25 chracaters<br>"; ?>

			<input type="text" name="reg_lname" placeholder="Last Name" value="<?php
				if (isset($_SESSION['reg_lname'])) {
					 echo $_SESSION['reg_lname'];
				}
				?>" required>
			<br>

			<?php if(in_array("Your Last Name must be between 2 and 25 chracaters<br>", $error_array)) echo "Your Last Name must be between 2 and 25 chracaters<br>"; ?>

			<input type="email" name="reg_email" placeholder="Email" value="<?php
				if (isset($_SESSION['reg_email'])) {
					 echo $_SESSION['reg_email'];
				}
				?>" required>
			<br>

			<?php if(in_array("Email already exist<br>", $error_array)) echo "Email already exist<br>"; ?>

			<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
				if (isset($_SESSION['reg_email2'])) {
					 echo $_SESSION['reg_email2'];
				}
				?>" required>
			<br>

			<?php if(in_array("Email already exist<br>", $error_array)) echo "Email already exist<br>"; 
			        else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>"; 
			        else if(in_array("Emails don t match<br>", $error_array)) echo "Emails don t match<br>"; ?>

			<input type="password" name="reg_password" placeholder="Password" required>
			<br>
			<input type="password" name="reg_password2" placeholder="Confirm Password"
			 required>
			<br>

			<?php if(in_array("Your password don t match<br>", $error_array)) echo "Your password don t match<br>"; 
			        else if(in_array("Your password can only contains english characters or numbers<br>", $error_array)) echo "Your password can only contains english characters or numbers<br>"; 
			        else if(in_array("Your password must be between 5 and 30 characters<br>", $error_array)) echo "Your password must be between 5 and 30 characters<br>"; ?>

			<input type="submit" name="reg_button" value="Register">
			<br>
			<?php if(in_array("<span style='color: #14C800;'> Succesfully registered ! </span>", $error_array)) echo "<span style='color: #14C800;'> Succesfully registered ! </span>"; ?>
		</form>
		</div>
	</div>

</body>
</html>