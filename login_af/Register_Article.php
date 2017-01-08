<?php

	session_start();
	$db= mysql_connect("localhost", "root", " ","login_af"); 
	if(isset($_post['register_btn']))
	{
		$username=$_post['txt_user'];
		$email=$_post['txt_email'];
	}

?>





<!DOCTYPE html>
<html>
<head><title> Login For Write a Review</title></head>
<body>
<h3> Login for Post the Article</h3>

<form method="post" action="Register_Article">
<table align="center"> 
	<tr>
		<td>User Name:</td>
		<td><input type="text" name="txt_user" class="textInput"></td>
	</tr>
    
    <tr>
		<td>Full Name:</td>
		<td><input type="email" name="full_name" class="textInput"></td>
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
