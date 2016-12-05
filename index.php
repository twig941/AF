<?php
require_once"init.php";
$a = new Announcement("localhost", "AlexG", "Ducktalesz1", "THE_ARTISTS_FORUM");


?>

<!DOCTYPE HTML>
<html lang = "en">
<head>
<meta charset = "utf-8">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> for mobile -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    <!-- Jquery library -->
<link type = "text/css" rel = "stylesheet" href = "HomepageStyle.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
<title> Home </title>
</head>
<body>

    <script>
        /*jquery code for swapping images */
        $(document).ready(function() {
             var timeForInterval = 5000;
               function ImageSlider(currentImage) {
                   
            this.currentImage = currentImage; //global to the whole function */
            var imageToShow = ["#image1", "#image2", "#image3", "#image4"];
            var currentCircule = ["#circle1", "#circle2", "#circle3", "#circle4"];
            var fadeOutTime = 0;
            var fadeInTime = 200;
            this.getCurrentCircle = function() {
               return currentCircule;
            };
            this.getCurrentImage = function() {
                return currentImage;
            };
            this.setCurrentImage = function(cImage) {
                currentImage = cImage;
            }
            var currentText = ["#text1", "#text2", "#text3", "#text4"];
                   /* assign when to go back to the first image or to the last one to not get an error */
            this.cycleRight = function(conditional, conditionalAssignment) {
            $(imageToShow[currentImage]).animate({left: "-1550px"}, 200, function() {
                $(this).css("display", "none"); 
                 $(currentText[currentImage]).fadeOut(fadeOutTime, "swing", function() {
            $(currentCircule[currentImage]).css("background-color", "tan");
            currentImage++;
            if (currentImage == conditional)  currentImage = conditionalAssignment;
            $(currentText[currentImage]).fadeIn(fadeInTime);
            $(imageToShow[currentImage]).animate({left: "0px"}, 200).css("display", "inline-block"); 
            $(currentCircule[currentImage]).css("background-color", "black");
            });
});
           
            };
            this.clickCycleRight = function(conditional, conditionalAssignment) {
                this.cycleRight(conditional, conditionalAssignment);
                clearInterval(cycleInterval);
            };
                   
            this.clickCycleLeft = function(conditional, conditionalAssignment) {
           $(imageToShow[currentImage]).animate({left: "-1550px"}, 200, function() {
                $(this).css("display", "none"); 
                 $(currentText[currentImage]).fadeOut(fadeOutTime, "swing", function() {
            $(currentCircule[currentImage]).css("background-color", "tan");
            currentImage--;
            if (currentImage == conditional)  currentImage = conditionalAssignment;
            $(currentText[currentImage]).fadeIn(fadeInTime);
            $(imageToShow[currentImage]).animate({left: "0px"}, 200).css("display", "inline-block"); 
            $(currentCircule[currentImage]).css("background-color", "black");
            });
});
    };
           this.currentCircle =  function currentCircleClicked(imageIndex, circleIndex) {
                   $(imageToShow[imageIndex]).fadeOut(fadeOutTime); 
                /* callback is used here to prevent a glitch of images and text being pushed down when images are swaped */
            $(currentText[imageIndex]).fadeOut(fadeOutTime, "swing", function() {
                $(currentCircule[imageIndex]).css("background-color", "tan");
       $(currentText[circleIndex]).fadeIn(fadeInTime);
            $(imageToShow[circleIndex]).fadeIn(fadeInTime);
            $(currentCircule[circleIndex]).css("background-color", "black");
                    clearInterval(cycleInterval);
            });
           
            };         
}
   var rotatingImage = new ImageSlider(0); 
   var cycleInterval = setInterval(function() {
          rotatingImage.cycleRight(4, 0);   
        }, timeForInterval             
        ); //end of setInterval
            
           
            
        $(".hover-height-left").click(function() {
           rotatingImage.clickCycleLeft(-1, 3);
        });
             $(".hover-height-right").click(function() {
            rotatingImage.clickCycleRight(4, 0);
            });
            /* join the array of the circle selector, then get the one that's clicked on by its id,
            then select the last char of it which will be a number, and make it an integer, subtract one and that 
            is the index to show the image from */
            var allCircleSelector = rotatingImage.getCurrentCircle().join(",");
           $(allCircleSelector).click(function() {
              var circleClicked = this.id;
              var circleArrayIndex = parseInt(circleClicked.substring(circleClicked.length - 1, circleClicked.length)) - 1;
             //  alert(imageToShow[circleArrayIndex]);
               
              // alert(circleArrayIndex);
               if (circleClicked == "circle1")  rotatingImage.currentCircle(rotatingImage.getCurrentImage(), circleArrayIndex);
               else if (circleClicked == "circle2")  rotatingImage.currentCircle(rotatingImage.getCurrentImage(), circleArrayIndex);
               else if (circleClicked == "circle3") rotatingImage.currentCircle(rotatingImage.getCurrentImage(), circleArrayIndex);
               else if (circleClicked == "circle4") rotatingImage.currentCircle(rotatingImage.getCurrentImage(), circleArrayIndex);
                rotatingImage.setCurrentImage(circleArrayIndex);   
           });
            /* make the header widgets squares, one can put this in a scroll event to fix them from strectching when the users zooms in */
            
       
            var widthOfIcon = $("#youtube-icon").width();
          $(".header-widgets img").css("height", widthOfIcon);
               
            $(window).scroll(function() {
               var widthOfIcon = $("#youtube-icon").width();
          $(".header-widgets img").css("height", widthOfIcon);  
            });
            
            /*aligns the video to the image slide by taking the width of the button and the margin-left of the slide and making that the margin left of the video */
          
        var alignContent = setInterval(function(){
            var iFrameMargin = $(window).width()/100;
            var widthOfButton = $(".hover-height-left").width();
            var totalMarginOfVideo = iFrameMargin + widthOfButton;
         var frameMargin = $("iframe").css("margin-left", totalMarginOfVideo + "px");
               if (frameMargin === totalMarginOfVideo) clearInterval(alignContent);
           }, 250);
            
            
            /* script to make the size of the ad and announcement section the same it's put in a setInterval function to fix a bug where the height of the announcement area is 25px for new visiters to the site */
         var matchElements = setInterval(function() {
            var heightOfAd = $(".ad").height();
            $(".announcement").css("height", heightOfAd + "px");
            var temp = $(".announcement").height();
            if(heightOfAd === temp)  clearInterval(matchElements);
            }, 250);
            
      
        }); //end of document.ready
    </script>
       <!-- header widgets like the donate button, facebook, twitter, and youtube icons -->
    <div class = "header-widgets">
        
       <span id = "mission-statement"> <i> Specializing in Media, Events, and Juried Competetions for Artists </i> </span>
        
      
    <img id = "youtube-icon" src = "YouTube_BLACK.png">
    <img id = "instagram-icon"  src = "Instagram_BLACK.png">
    <img src = "Facebook_BLACK.png">
    <img src = "Twitter_BLACK.png">
          
    <span id = "float-login"> LOG IN</span>
          
    <img src = "http://imageog.flaticon.com/icons/png/512/49/49116.png?size=1200x630f&pad=10,10,10,10&ext=png&bg=FFFFFFFF">
           
    <div>
      
        <br>
        <br>
        <br>
       
        <a id = "donate-link" href = "#"> DONATE </a>
        <a id = "subscribe-link" href = "#"> SUBSCRIBE </a>
           
    </div>
    </div>
    
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
    
    <div class = "rotating-area">
        <div class = "hover-height-left">
    <span class = "glyphicon glyphicon-menu-left"> </span> 
            </div>
        
        <div class = "hover-height-right">
         <span class = "glyphicon glyphicon-menu-right"> </span> 
            </div>
    <img id = "image1" src = http://www.mrwallpaper.com/wallpapers/forest-trees-waterfall.jpg>
    <img id = "image2" src = http://wallpapercave.com/wp/v6dkdkN.jpg>
    <img id = "image3" src = https://c1.staticflickr.com/1/25/44040866_f74b3a3fd3_b.jpg>
    <img id = "image4" src = http://images.nationalgeographic.com/wpf/media-live/photos/000/894/overrides/glacier-national-park-hidden-lake_89495_600x450.jpg>
        <div class = "image-info"> 
            <div id = "item-info">
          <span id = "review-label">REVIEWS:</span>
            <br>
           <span id = "team-label">ARTISTS TEAM MEMBERS</span>
            <br>
                </div>
            <div id = "text1">
            1Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque blandit, lorem non aliquam commodo, lorem lorem posuere purus, sit amet lacinia erat leo vitae eros. Nullam justo leo, eleifend sed mi at, convallis convallis quam. Aenean neque nibh, blandit at commodo vel, volutpat ac lectus. Morbi fermentum placerat mauris, vel suscipit neque venenatis in. Phasellus massa ipsum, dictum nec augue sit amet, posuere facilisis mi. Etiam gravida turpis erat, et porta libero auctor eget. Donec vestibulum pharetra orci vel scelerisque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a ullamcorper dolor, sit amet sodales quam. Integer et magna at dui pharetra molestie quis et purus. 
        </div>
            
              <div id = "text2">
           2Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque blandit, lorem non aliquam commodo, lorem lorem posuere purus, sit amet lacinia erat leo vitae eros. Nullam justo leo, eleifend sed mi at, convallis convallis quam. Aenean neque nibh, blandit at commodo vel, volutpat ac lectus. Morbi fermentum placerat mauris, vel suscipit neque venenatis in. Phasellus massa ipsum, dictum nec augue sit amet, posuere facilisis mi. Etiam gravida turpis erat, et porta libero auctor eget. Donec vestibulum pharetra orci vel scelerisque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a ullamcorper dolor, sit amet sodales quam. Integer et magna at dui pharetra molestie quis et purus. 
        </div>
            
              <div id = "text3">
 3Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque blandit, lorem non aliquam commodo, lorem lorem posuere purus, sit amet lacinia erat leo vitae eros. Nullam justo leo, eleifend sed mi at, convallis convallis quam. Aenean neque nibh, blandit at commodo vel, volutpat ac lectus. Morbi fermentum placerat mauris, vel suscipit neque venenatis in. Phasellus massa ipsum, dictum nec augue sit amet, posuere facilisis mi. Etiam gravida turpis erat, et porta libero auctor eget. Donec vestibulum pharetra orci vel scelerisque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a ullamcorper dolor, sit amet sodales quam. Integer et magna at dui pharetra molestie quis et purus. 
        </div>
            
              <div id = "text4">
          4Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque blandit, lorem non aliquam commodo, lorem lorem posuere purus, sit amet lacinia erat leo vitae eros. Nullam justo leo, eleifend sed mi at, convallis convallis quam. Aenean neque nibh, blandit at commodo vel, volutpat ac lectus. Morbi fermentum placerat mauris, vel suscipit neque venenatis in. Phasellus massa ipsum, dictum nec augue sit amet, posuere facilisis mi. Etiam gravida turpis erat, et porta libero auctor eget. Donec vestibulum pharetra orci vel scelerisque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a ullamcorper dolor, sit amet sodales quam. Integer et magna at dui pharetra molestie quis et purus. 
        </div>
            
        <div class = "readmore-button"> <a href = "#"> READ MORE </a> </div>
        
        </div> <!-- end image info div -->
        
    <div class = "rotating-area-controls"> 
        
        
        <div class = "current-picture">
        <div id = "circle1" class = "circle"></div>
        <div id = "circle2" class = "circle"></div>
        <div id = "circle3" class = "circle"></div>
        <div id = "circle4" class = "circle"></div>
          
        </div>
    </div>
        
        
    </div> <!-- end div of rotating image -->
    
    <div class = "separation">
       
    </div>
    
    
    <div class = "rotating-area">
    <iframe src="https://www.youtube.com/embed/fiGsmtjYNss" frameborder="0" allowfullscreen></iframe>
        <div class = "video-info"> 
          <div id = "review-label">AFTV #:</div>
        
           <div id = "team-label">ARTISTS TEAM MEMBERS</div>
            
            <span id = "video-description">
     A video description  A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description 
                
                <div class = "align-video-controls">
                    <div class = "glyphicon glyphicon-menu-left"> <span id = "nextVideo"> NEXT AFTV </span> </div>
   <div class = "glyphicon glyphicon-menu-right">   </div>
                </div>
       
                
        </span>
              </div>
            
    
    </div>
    
     <div class = "separation">
       
    </div>
    
        
   <div class = "announcement-ad-row">
    <div class = "announcement">
        <div class = "announcement-title"><b>ANNOUNCEMENTS</b></div>
        <div class = "flex-center">
        <div class = "announcement-1">
        <?php
        echo $a->selectAnnouncement(0);
        ?>
        </div>
        
        <div class = "announcement-2">
         <?php
        echo $a->selectAnnouncement(1);
        ?>
        </div>
        
        <div class = "announcement-3">
          <?php
        echo $a->selectAnnouncement(2);
        ?>
        </div>
        </div>
    </div>
    
    <div class = "ad">
       <img src = http://creativeclouduser.com/wp-content/uploads/2013/05/acclogo.jpg>
    </div>
    
    </div>
    
    
    
<div class = "aside-information">
    
 <div class = "template-info">  Some information could go here such as, Info on the organization, trademarks, extra info, contact info, etc </div>
    
    
    
</div>
    
    
  

</body>


</html>