<?php

$con = mysqli_connect("localhost","root","","socialnetwork");
   if(mysqli_connect_errno()){
   	echo "Failed to connect:".mysqli_connect_errno();
   }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SocialNetwork</title>
</head>
<body>
   <h1>Hello Stafie !</h1>
</body>
</html>