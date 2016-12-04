<?php

	$servername= "localhost";
	$user= "root";
	$psw= "";
	$db= new mysqli($servername,$user,$psw,"login_af"); 
	if ($db->connect_error) {
		die('Could not connect: ' .$db->connect_error );
	}
		echo 'Connected successfully';


	if(isset($_post['register_btn']))
	{
		$eventname=$_post['txt_title'];
		$personame=$_post['txt_person'];
		$email=$_post['txt_email'];
		$username=$_post['txt_user'];
		$password=$_post['password'];
		$organization=$_post['txt_organization'];
		$location=$_post['txt_location'];
		$address=$_post['txt_address'];
		$phonenumber=$_post['txt_phone'];
		$website=$_post['txt_website'];
		
		
	}
?>

<!DOCTYPE html>
<html>
<head><title>Posting an Event</title></head>
<body>
<h2><center> Login for Posting Event</center></h2>

<form method="post" action="Posting_Event">
<table align="center"> 
	<tr>
		<td>Title of Event:</td>
		<td><input type="text" name="txt_title" class="textInput"></td>
	
	</tr>
	<tr>
		<td>Name of Person:</td>
		<td><input type="text" name="txt_person" class="textInput"></td>
	</tr>	
	
	<tr>
		<td>Email ID:</td>
		<td><input type="email" name="txt_email" class="textInput"></td>
	</tr>
	
	<tr>
		<td>UserName:</td>
		<td><input type="text" name="txt_user" class="textInput"></td>
	</tr>
	
	<tr>
		<td>Password:</td>
		<td><input type="password" name="password" class="textInput"></td>
	</tr>

     <tr>
		<td>Organization Name:</td>
		<td><input type="text" name="txt_organization" class="textInput"></td>
	</tr>

	<tr>
		<td>Location:</td>
		<td><input type="text" name="txt_location" class="textInput"></td>
	</tr>

	<tr>
		<td>Address:</td>
		<td><input type="text" name="txt_address" class="textInput"></td>
	</tr>	
	
	<tr>
		<td>Phone Number:</td>
		<td><input type="text" name="txt_phone" class="textInput"></td>
	</tr>
	
	<tr>
		<td>Website:</td>
		<td><input type="text" name="txt_website" class="textInput"></td>
	</tr>
	
	
	
	<tr>
		<td></td>
		<td><input type="Submit" name="register_btn" value="Register"></td>
	</tr>	

</table>

</form>
</body>
</html>
