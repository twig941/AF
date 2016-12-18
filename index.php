<?php
require_once"init.php";
$a = new Announcement("localhost", "AlexG", "Ducktalesz1", "THE_ARTISTS_FORUM");
$ad = new Ad("localhost", "AlexG", "Ducktalesz1", "THE_ARTISTS_FORUM");    

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
            var animationOutTime = 0;
            var animationTime = 200;
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
            $(imageToShow[currentImage]).animate({left: "-9000px"}, animationTime, function() {
                $(this).css("display", "none"); 
                 $(currentText[currentImage]).fadeOut(animationOutTime, "swing", function() {
            $(currentCircule[currentImage]).css("background-color", "tan");
            currentImage++;
            if (currentImage == conditional)  currentImage = conditionalAssignment;
            $(currentText[currentImage]).fadeIn(animationTime);
            $(imageToShow[currentImage]).animate({left: "0px"}, animationTime).css("display", "inline-block"); 
            $(currentCircule[currentImage]).css("background-color", "black");
            });
               
}).stop(true, true);
           
            };
            this.clickCycleRight = function(conditional, conditionalAssignment) {
                this.cycleRight(conditional, conditionalAssignment);
                clearInterval(cycleInterval);
            };
                   
            this.clickCycleLeft = function(conditional, conditionalAssignment) {
          $(imageToShow[currentImage]).animate({left: "-1550px"}, animationTime, function() {
                $(this).css("display", "none"); 
                 $(currentText[currentImage]).fadeOut(animationOutTime, "swing", function() {
            $(currentCircule[currentImage]).css("background-color", "tan");
            currentImage--;
            if (currentImage == conditional)  currentImage = conditionalAssignment;
            $(currentText[currentImage]).fadeIn(animationTime);
            $(imageToShow[currentImage]).animate({left: "0px"}, animationTime).css("display", "inline-block"); 
            $(currentCircule[currentImage]).css("background-color", "black");
            });
}).stop(true, true);
    };
           this.currentCircle =  function currentCircleClicked(imageIndex, circleIndex) {
                   $(imageToShow[imageIndex]).fadeOut(animationOutTime); 
                /* callback is used here to prevent a glitch of images and text being pushed down when images are swaped */
            $(currentText[imageIndex]).fadeOut(animationOutTime, "swing", function() {
                $(currentCircule[imageIndex]).css("background-color", "tan");
       $(currentText[circleIndex]).fadeIn(animationTime);
            $(imageToShow[circleIndex]).fadeIn(animationTime);
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
            
            
    /*
    When the user scrolls down where the navbar would normally be not be visibile,
    this code will make it so when that happens the navbar will have a fixed position
    and be fixed to the top of the page
    */
    $(window).scroll(function() {
     var positionFromTopForWindow = $(window).scrollTop();    
    var positionFromTopForNavBar = $("nav").offset().top;
                
    
    var negateHeaderOffSet = $("nav ul#main-list").css("margin-top");
                if (positionFromTopForWindow > positionFromTopForNavBar) {
                    $("nav").css({"position": "fixed", "top": "-"+negateHeaderOffSet}); //makes the element site at the top of the page
                }
        if (positionFromTopForWindow == 0) {
            /* put the menu back where it was originally located */
            $("nav").css("opacity", "0");
            $("nav").animate({"top": "0px"}, 20, "swing", function() {
                $(this).fadeTo(500, 1);
                 $(this).css("position", "static");
            });
        }
                
    });    
            
    $(".search-bar").click(function() {
        $(".search-menu").slideToggle(500);
    });
    
       
            
           
            
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
            
            /*code removed when the arrows were added to the video keep in case of bug for the moment
         var frameMargin = $("iframe").css("margin-left", totalMarginOfVideo + "px");
         if (frameMargin === totalMarginOfVideo)
         */
            
            
            
            /* make the line margins equals to the frameMargin */
            $("nav ul#main-list").css({"margin-left": totalMarginOfVideo, "margin-right": totalMarginOfVideo});
            $(".separation").css({"margin-left": totalMarginOfVideo, "margin-right": totalMarginOfVideo});
            
           $(".hover-menu").css({"margin-left": totalMarginOfVideo, "margin-right": totalMarginOfVideo});
            $(".search-menu ").css({"margin-left": totalMarginOfVideo, "margin-right": totalMarginOfVideo});
            $(".announcements-row").css({"margin-left": totalMarginOfVideo, "margin-right": totalMarginOfVideo});
            
                clearInterval(alignContent);
           }, 250);
            
            
            /* script to make the size of the ad and announcement section the same it's put in a setInterval function to fix a bug where the height of the announcement area is 25px for new visiters to the site */
     
            
            /* 
            set the announcement row to a height to allow the use of a border 
            */
            var heightOfAnnouncement = $(".announcement-column").outerHeight(true);
           
            $(".announcements-row").css("height", heightOfAnnouncement + "px");
            
      
        }); //end of document.ready
    </script>
       <!-- header widgets like the donate button, facebook, twitter, and youtube icons -->
    <div class = "header-widgets">
    <div class = "right-container"> 
    <img id = "youtube-icon" src = "youtube-icon.png">
    <img id = "instagram-icon"  src = "instagram-icon.png">
    <img src = "facebook-icon.png">
    <img src = "twitter-icon.png">
    <span class = "login-button"> LOG IN </span>    
     </div>  
        <div>
        <span class = "login-button1">SUBSCRIBE</span>
      
        <span class = "login-button2">DONATE</span>
            </div>
        <img class = "logo" src ="300dpi_WHITEtrans_TokyoNYC-05.png">
      <i class = "mission-statement">media, events, and competetions for artists</i>
        
    
      

     

    </div>
    
    <nav>
      <ul id = "main-list">
       <li> <a href = "#">HOME</a></li> 
          
       <li> <a href = "#">ABOUT</a>
           
       <ul id = "hidden-menu">
           <div class = "hover-menu">
               <span class = "tab-info">------ description perhaps?------ leo efficitur sodales eu non ex. Quisque convallis vulputate leo, sed luctus diam vestibulum in. Mauris molestie mauris mi, a suscipit nulla venenatis id. Aliquam maximus, risus scelerisque ultricies dignissim, lectus nunc varius lectus, eget eleifend felis risus sed eros. Nullam sit amet nibh vel odio finibus mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin mollis neque nec dolor aliquam, lobortis tempor ligula semper. Integer orci tellus, aliquet nec commodo at, egestas vel magna. Ut cursus luctus odio a posuere. </span>
       <li> <a href = "#">HOME</a></li> 
       <li> <a href = "#">HOME</a></li> 
       <li> <a href = "#">HOME</a></li>
            
           </div>
       
          
       </ul> 
           
       </li>
          
       <li> <a href = "#">AF MAG</a></li> 
       <li> <a href = "#">AFTV</a></li>
       <li> <a href = "#">EVENTS</a></li> 
       <li> <a href = "#">COMPETITIONS</a></li> 
       <li> <a href = "#">RESOURCES</a></li> 
       <li> <a href = "#">LISTINGS</a></li> 
       <li> <a href = "#">SUPPORT AF</a></li> 
       <li> <span class = "glyphicon glyphicon-search search-bar"></span></li> 
        
        
        </ul>
    </nav>
    
    <div class = "search-menu">
    
        <form>
        <input placeholder="Search The Site" type = "text" name = "search-site">
        <br>
        <input type = "submit" value = "Submit">
        </form>
    
    </div>
    
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
         <div class = "rotating-area">
        <div class = "hover-height-left">
    <span class = "glyphicon glyphicon-menu-left"> </span> 
            </div>
        
        <div class = "hover-height-right">
         <span class = "glyphicon glyphicon-menu-right"> </span> 
            </div>
        
    <iframe src="https://www.youtube.com/embed/fiGsmtjYNss" frameborder="0" allowfullscreen></iframe>
        <div class = "video-info"> 
          <div id = "review-label">AFTV #:</div>
        
           <div id = "team-label">ARTISTS TEAM MEMBERS</div>
            <div id ="members-label"> MEMBERS </div>
            <div id = "video-description">
     A video description  A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description A video description 
                
                
       
                
        </div>
              </div>
            
    
    </div>
    
     <div class = "separation">
       
    </div>
        
        <div class = "announcements-row">
            
        <div class = "announcement-column">
        <div class = "announcement-name">ANNOUNCEMENT:</div>
        <div class = "announcement-title">REVIEWERS NEEDED</div>
        <div class = "announcement-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non egestas risus. Integer porttitor orci vitae ante tincidunt, varius viverra ex cursus. Integer sapien elit, elementum pulvinar nibh eu, bibendum iaculis velit. Morbi fermentum lacinia urna. Suspendisse potenti. Donec dapibus. </div>
         </div>
            
        <div class = "announcement-column">
        <div class = "announcement-name">ANNOUNCEMENT:</div>
        <div class = "announcement-title">REVIEWERS NEEDED</div>
        <div class = "announcement-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non egestas risus. Integer porttitor orci vitae ante tincidunt, varius viverra ex cursus. Integer sapien elit, elementum pulvinar nibh eu, bibendum iaculis velit. Morbi fermentum lacinia urna. Suspendisse potenti. Donec dapibus. </div>
         </div>
            
     <div class = "announcement-column">
        <div class = "announcement-name">ANNOUNCEMENT:</div>
        <div class = "announcement-title">REVIEWERS NEEDED</div>
        <div class = "announcement-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non egestas risus. Integer porttitor orci vitae ante tincidunt, varius viverra ex cursus. Integer sapien elit, elementum pulvinar nibh eu, bibendum iaculis velit. Morbi fermentum lacinia urna. Suspendisse potenti. Donec dapibus. </div>
         </div>
            
        </div>
        
        <div class = "separation">
       
    </div>
    
       
    <!--
   <div class = "announcement-ad-row">
    <div class = "announcement">
        <div class = "announcement-title"><b>ANNOUNCEMENTS</b></div>
        <div class = "flex-center">
        <div class = "announcement-1">
        <?php
/*
        echo $a->selectAnnouncement(0);
        */
        ?>
        </div>
        
        <div class = "announcement-2">
         <?php
/*
        echo $a->selectAnnouncement(1);
        */
        ?>
        </div>
        
        <div class = "announcement-3">
          <?php/*
        echo $a->selectAnnouncement(2);
        */
        ?>
        </div>
        </div>
    </div>
    
    <div class = "ad">
       <img src = <?php /*echo $ad->getLastAdLocation();*/ ?>
    </div>
    
    </div>
    -->
     
    
<div class = "aside">
        
<div class = "AF-address">
<div class = "organization-name">THE ARTISTS FORUM, INC.</div>   
<div>PO BOX 1646</div>   
<div>NEW YORK, NY 10026</div>
<br>
<div>info@theartistsforum.org</div>

</div>
    
<div class = "AF-other-items">
<div>CONTACT</div>   
<div>MASTHEAD</div>   
<div>VOLUNTEERING</div>
<div>DONATING</div>
<div>PARTNERING</div> 
</div>
        
        
</div>
    
    
  

</body>


</html>