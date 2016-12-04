<?php
session_start();
require_once"init.php";
$sess = new Session();


if (!isset($_SESSION["access_level"]) || $sess->checkUserLevel() !== "MASTER") {
   die("This page doesn't exist and is a work in progress");
}


$a = new Announcement("localhost", "AlexG", "Ducktalesz1", "THE_ARTISTS_FORUM");
//$a->createAnnouncementTable();

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
    
    <script>
    
    $(document).ready(function() {
        $("div.nav-icon").click(function() {
            $("#items-menu").slideToggle(100);
        });
        
    });
    
    
    </script>
    
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
    
    <div class = "master-navigation">
    
  <div class = "nav-icon">  ☰ MENU   
        
      <ul id = "items-menu">
      <li><a href = "#"> Post a Video </a></li>
      <li><a href = "#"> Confirm Articles </a></li>
      <li><a href = "#"> Confirm Events </a></li>
      <li><a href = "#"> Change Announcements </a></li>
      <li><a href = "#"> Change Ad </a></li>
      
      </ul>  
        
</div>
    </div>
    
    
    
    <div class = "toolbar-menu">
    <div class = "toolbar-header"> Toolbar </div>
    
    
    </div>
    
    
<?php
    /*logic to change the current system that needs to be changed */
    if (isset($_GET["change"])) {
    if ($_GET["change"] === "announcement") {
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if($a->updateAnnouncement($_POST["announcement0"], $_POST["announcement1"], $_POST["announcement2"])) {
                echo "<div style = 'text-align:center; font-size: 175%; font-weight: 600;'>The announcements have been changed </div>";
            }
            else {
                echo "<div style = 'text-align:center; font-size: 175%; font-weight: 600;'>Something went wrong </div>";
            }
        }
        echo "<form method = 'POST' action = ''>";
        for($i = 0; $i<3; $i++) {
        $numberOfPost = $i + 1;
        echo "<div style = 'text-align:center; margin-top:4%;'>";
        echo "<div style = 'font-size: 125%;'> Announcement Number " . $numberOfPost . "</div>";
        echo "<textarea name = announcement{$i}>" . $a->selectAnnouncement($i) . "</textarea>";
        echo "</div>";
        }
        echo "<input type = 'submit' name = 'submit' value = 'submit'>";
        echo "</form>";
        
        echo "<div style = 'text-align:center; font-size: 175%; font-weight: 600; padding-top: 5%;'> How it looks </div>";
    echo "<div class = 'announcement-ad-row'>
    <div class = 'announcement'>
        <div class = 'announcement-title'><b>ANNOUNCEMENTS</b></div>
        <div class = 'flex-center'>
        <div class = 'announcement-1'>";
        echo $a->selectAnnouncement(0);
        echo "</div>
        
        <div class = 'announcement-2'>";
        echo $a->selectAnnouncement(1);
        echo "</div>
        
        <div class = 'announcement-3'>";
        echo $a->selectAnnouncement(2);
        echo "</div>
        </div>
    </div>
    
    <div class = 'ad'>
       <img src = http://creativeclouduser.com/wp-content/uploads/2013/05/acclogo.jpg>
    </div>
    
    </div>
    ";    
    }
        
        if ($_GET["change"] === "video") {
            $v = new Video("localhost", "AlexG", "Ducktalesz1", "THE_ARTISTS_FORUM");
            //$v->createVideoTable();
            //echo $v->linkToEmbed("https://www.youtube.com/watch?v=ihVM5WC63w8");
        }
}
?>
    
</body>
</html>