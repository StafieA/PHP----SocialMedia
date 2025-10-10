
<?php

 session_start();

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
$error_array =array();

       			if(isset($_POST['reg_button'])){
       				//First name
       				$fname = strip_tags($_POST['reg_fname']);   //Remove html tags
       				$fname = str_replace(' ','', $fname);        //Remove spaces
       				$fname = ucfirst(strtolower($fname));       //Lowercase all letter and uppercase the first one
       				$_SESSION['reg_fname'] = $fname;            //Stores first name in session variable
       				
       				//Last name
       				$lname = strip_tags($_POST['reg_lname']);
       				$lname = str_replace(' ','', $lname);       //Remove spaces
       				$lname = ucfirst(strtolower($lname));       //Lowercase all letter and uppercase the first 
       				$_SESSION['reg_lname'] = $lname;            //Stores last name in session variable
       				
       				//Email
       				$email = strip_tags($_POST['reg_email']);
       				$email = str_replace(' ','', $email);       //Remove spaces
       				$email = ucfirst(strtolower($email));       //Lowercase all letter and uppercase the first one
       				$_SESSION['reg_email'] = $email;            //Stores email in session variable
       				
       				// Confirmation email
       				$email2 = strip_tags($_POST['reg_email2']);
       				$email2 = str_replace(' ','', $email2);       //Remove spaces
       				$email2 = ucfirst(strtolower($email2));       //Lowercase all letter and uppercase the first one
       				$_SESSION['reg_email2'] = $email2;            //Stores email2 in session variable
       				
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
	       							array_push($error_array, "Email already exist<br>");
	       						}
       					
       					} else {
       						array_push($error_array, "Invalid email format<br>");
       					}

       				} else {
       					array_push($error_array, "Emails don t match<br>");
       				}


       				if(strlen($fname) >25 || strlen($fname)<2){
       					array_push($error_array, "Your First Name must be between 2 and 25 chracaters<br>");
       				}
       				if(strlen($lname) >25 || strlen($lname)<2){
       					array_push($error_array, "Your Last Name must be between 2 and 25 chracaters<br>");
       				}

       				if($password != $password2){
       					array_push($error_array, "Your password don t match<br>");
       				}else{
       					if(preg_match('/[^A-Za-z0-9]/', $password)){
       						array_push($error_array, "Your password can only contains english characters or numbers<br>");
       					}
       				}

       				if(strlen($password) >30 || strlen($password)<5){
							array_push($error_array, "Your password must be between 5 and 30 characters<br>");
                        }

                        if(empty($error_array)){
                        	$password = md5(password);  //Encrypt password for database
                        	$username = strtolower($fname."_".$lname); 

                        	$usernames_query = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");
                        	$i = 0;

                        	while(mysqli_num_rows($usernames_query) != 0){
                        		$i++;
                        	     $username = $username."_".i;
                        	     $usernames_query = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");

                        		}

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
	</form>

</body>
</html>