<?php

//remove quotes aroound INSERT INTO `registration_article`(`name`,`username`,`email`,`password`)
//change action to "" for it to submit to the same file
//to make a mysqli object it is just new mysqli not new mysqli_connect
//$_POST superglobal must be capital

	$connection =  new mysqli("localhost","AlexG", "Ducktalesz1","THE_ARTISTS_FORUM");


/*
    $tableQuery = "CREATE TABLE IF NOT EXISTS registration_article (
    ID INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
    )";

    $connection->query($tableQuery);
	*/
	if(isset($_POST['register_btn']))
	{
		
		
		$name=$_POST['txt_name'];
		$username=$_POST['txt_user'];
		$email=$_POST['txt_email'];
		$password=$_POST['password'];
		
		$query = "INSERT INTO `registration_article`(name,username,email,password) VALUES ( '$name', '$username', '$email', '$password')";
        
        if (!$query) {
            echo "error" . mysqli_error($connection);
        }
		if($connection->query($query))
		{
			
			echo " You are successfully registred.";
		}
		else
		{
			echo "You are not registred.";
		}
		
	    
		
	}

	
	mysqli_close($connection);


?>





<!DOCTYPE html>
<html>
<head><title> Login For Write a Review</title></head>
<body>
<h2><center> Login for Post the Article</center></h2>

<form  action="" method="post">
<table align="center"> 
<tr>
		<td>Full Name:</td>
		<td><input type="text" name="txt_name" class="textInput"></td>
	</tr>
	
	<tr>
		<td>UserName:</td>
		<td><input type="text" name="txt_user" class="textInput"></td>
	</tr>
	
	
	<tr>
		<td>Email ID:</td>
		<td><input type="email" name="txt_email" class="textInput"></td>
	</tr>	
	
	<tr>
		<td>Password:</td>
		<td><input type="password" name="password" class="textInput"></td>
	</tr>	
	
	<tr>
		<td></td>
		<td><input type="Submit" name="register_btn" value="Register"></td>
	</tr>	

</table>

</form>
</body>
</html>