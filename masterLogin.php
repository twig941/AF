<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
require_once"init.php";
    /*
     call to create table
    $db = new database("localhost", "AlexG", "Ducktalesz1", "THE_ARTISTS_FORUM");
$db->createMasterLoginTable();
*/
$l = new login("localhost", "AlexG", "Ducktalesz1", "THE_ARTISTS_FORUM", $_POST["username"], $_POST["password"]);

if ($l->checkLogin("af_webmaster_login")) {
    //redirect to posting panel
    session_start();
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["access_level"] = "MASTER";
    header("Location:/AF/MasterPanel.php");
}
else {
    $feedback = "<span style = 'color: darkred;font-weight: 600;font-size: 125%; text-decoration: underline;'> Your Login Information Could not be found</span><br>";
}
}
?>

<!DOCTYPE HTML>
<html lang = "en">
<head>
<link type = "text/css" rel = "stylesheet" href = "HomepageStyle.css">
<link type = "text/css" rel = "stylesheet" href = "masterLogin.css">
<meta charset = "utf-8">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> for mobile -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    <!-- Jquery library -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
<title> Login </title>
</head>
<body>
    
     <nav>
      
            <img class = "AF-logo" src ="300dpi_WHITEtrans_TokyoNYC-05.png">
     
    
        
        <!-- nav bar list -->
        <ul>
        <li> <a href = "#">HOME</a> </li>
        <li id = "About"> <a href = "#">ABOUT</a> 
            <div class = "nav-content">
            <div class = "hover-menu">
            <ul>
            <li> <a href = "#">ExtraOne</a></li>
            <li> <a href = "#">ExtraTwo</a></li>
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            </ul>  
            </div>
            </div>
            </li>
        <li id = "AFMAG"> <a href = "#">AF MAG</a> 
            <div class = "nav-content">
            <div class = "hover-menu">
            <ul>
            <li> <a href = "#">ExtraOne</a></li>
            <li> <a href = "#">ExtraTwo</a></li>
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            </ul>
            </div>
            </div>
            </li>
        <li> <a href = "#">AFTV</a> 
         <div class = "nav-content">
            <div class = "hover-menu">
            <ul>
            <li> <a href = "#">ExtraOne</a></li>
            <li> <a href = "#">ExtraTwo</a></li>
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            </ul>  
            </div>
            </div>    
        </li>
        <li> <a href = "#">EVENTS</a>
             <div class = "nav-content">
            <div class = "hover-menu">
            <ul>
            <li> <a href = "#">ExtraOne</a></li>
            <li> <a href = "#">ExtraTwo</a></li>
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            </ul>  
            </div>
            </div>
            
        </li>
        <li> <a href = "#">COMPETITIONS</a> 
             <div class = "nav-content">
            <div class = "hover-menu">
            <ul>
            <li> <a href = "#">ExtraOne</a></li>
            <li> <a href = "#">ExtraTwo</a></li>
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            </ul>
            </div>
            </div>
            </li>
        <li> <a href = "#">RESOURCES</a> 
             <div class = "nav-content">
            <div class = "hover-menu">
            <ul>
            <li> <a href = "#">ExtraOne</a></li>
            <li> <a href = "#">ExtraTwo</a></li>
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            </ul> 
            </div>
            </div>
            </li>
        <li> <a href = "#">LISTINGS</a> 
             <div class = "nav-content">
            <div class = "hover-menu">
            <ul>
            <li> <a href = "#">ExtraOne</a></li>
            <li> <a href = "#">ExtraTwo</a></li>
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            </ul>
            </div>
            </div>
            </li>
        <li> <a href = "#">SUPPORT AF</a> 
             <div class = "nav-content">
            <div class = "hover-menu">
            <ul>
            <li> <a href = "#">ExtraOne</a></li>
            <li> <a href = "#">ExtraTwo</a></li>
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            <li> <a href = "#">ExtraTwo</a></li>   
            </ul>
            </div>
            </div>
            </li>
        </ul>
    
    </nav>
    



<form method = "POST" action = "">
<?php
if (isset($feedback)) echo $feedback;
?>
    
<label>Username:</label><input type = "text" name = "username">
<br>
<label>Password:</label><input type = "password" name = "password">
<br>
<input type = "submit" name = "submit" value = "LOG IN">    

</form>

    
</body>
</html>