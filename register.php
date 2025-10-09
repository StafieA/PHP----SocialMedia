
<?php

$con = mysqli_connect("localhost","root","","socialnetwork");
   if(mysqli_connect_errno()){
   	echo "Failed to connect:".mysqli_connect_errno();
   }
$fname="";
$lname="";
$email="";
$email2="";
$password="";
$password2="";
$date ="";
$error_arry ="";

       			if(isset($_POST['reg_button'])){
       				//First name
       				$fname = strip_tags($_POST['reg_fname']);   //Remove html tags
       				$fname = str_replace(' ','', $fname);        //Remove spaces
       				$fname = ucfirst(strtolower($fname));       //Lowercase all letter and uppercase the first one
       				
       				//Last name
       				$lname = strip_tags($_POST['reg_lname']);
       				$lname = str_replace(' ','', $lname);       //Remove spaces
       				$lname = ucfirst(strtolower($lname));       //Lowercase all letter and uppercase the first one
       				
       				//Email
       				$email = strip_tags($_POST['reg_email']);
       				$email = str_replace(' ','', $email);       //Remove spaces
       				$email = ucfirst(strtolower($email));       //Lowercase all letter and uppercase the first one
       				
       				// Confirmation email
       				$email2 = strip_tags($_POST['reg_email2']);
       				$email2 = str_replace(' ','', $email2);       //Remove spaces
       				$email2 = ucfirst(strtolower($email2));       //Lowercase all letter and uppercase the first one
       				
       				//Password
       				$password= strip_tags($_POST['reg_password']);

       				//Password
       				$password2= strip_tags($_POST['reg_password2']);
       				
       				$date = date("Y-m-d"); //Current date

       				if($email == $email2){
       					if(filter_var($email,FILTER_VALIDATE_EMAIL)){

       						$email = filter_var($email,FILTER_VALIDATE_EMAIL);

       						$query_result = mysqli_query($con,"SELECT email FROM users where email='$email'");

       						
       						$num_rows = mysqli_num_rows($query_result);
       						
       						
       						if($num_rows > 0){
       							echo "Email already exist";
       						}
       					}
       					else{
       						echo "Invalid format";
       					}

       				} else{
       					echo "Emails don t match";
       				}
       			}

?>







<!DOCTYPE html>
<html>
<head>
	
	<title></title>
</head>
<body>
	<form action="register.php" method="POST">
		<input type="text" name="reg_fname" placeholder="First Name" required>
		<br>
		<input type="text" name="reg_lname" placeholder="Last Name" required>
		<br>
		<input type="email" name="reg_email" placeholder="Email" required>
		<br>
		<input type="email" name="reg_email2" placeholder="Confirm Email" required>
		<br>
		<input type="password" name="reg_password" placeholder="Password" required>
		<br>
		<input type="password" name="reg_password2" placeholder="Confirm Password"
		 required>
		<br>
		<input type="submit" name="reg_button" value="Register">
	</form>

</body>
</html>