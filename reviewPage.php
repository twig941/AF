<?php


require_once"init.php";
$a = new Announcement("localhost", "AlexG", "Ducktalesz1", "THE_ARTISTS_FORUM");
$ad = new Ad("localhost", "AlexG", "Ducktalesz1", "THE_ARTISTS_FORUM");    
$review = new Reviews("localhost", "AlexG", "Ducktalesz1", "THE_ARTISTS_FORUM");
$session = new Session();
$validateURL = new Validate();
$comments = new Comments("localhost", "AlexG", "Ducktalesz1", "THE_ARTISTS_FORUM");
//$comments->createCommentsTable();
if (isset($_GET["id"])) {
    if ($validateURL->isValidIdUrl($_GET["id"])) {}
}

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
            function equalMargin(selector) {
                $(selector).css({"margin-left": totalMarginOfVideo, "margin-right": totalMarginOfVideo});
            }
            

           
            
            
            equalMargin("nav ul#main-list");
            equalMargin(".separation");
            equalMargin(".hover-menu");
            equalMargin(".search-menu ");
            equalMargin(".announcements-row");
            equalMargin(".review");
            equalMargin(".ad-images");
            equalMargin("#star1,#star2,#star3,#star4,#star5");
            equalMargin(".comment-section");
            clearInterval(alignContent);
           }, 250);
            
            
            /* script to make the size of the ad and announcement section the same it's put in a setInterval function to fix a bug where the height of the announcement area is 25px for new visiters to the site */
     
            
            /* 
            set the announcement row to a height to allow the use of a border 
            */
            var heightOfAnnouncement = $(".announcement-column").outerHeight(true);
           
            $(".announcements-row").css("height", heightOfAnnouncement + "px");
            
            
            /*gets the total height of the review */
            
            function ReviewLayout() {
                this.height = "1000px";
                this.equalizeAd = function equalize() {
                    $(".ad-images").css("height", this.height);
                };
                this.heightOfReview = function getReviewHeight() {
                var height = $(".review").outerHeight(true) + "px";
                this.height = height;
            };
                
                
            }
            
            var Review = new ReviewLayout();
            Review.heightOfReview();
            Review.equalizeAd();
            
            
            
 /*
 use these functions like so
 found at: http://stackoverflow.com/questions/1987524/turn-a-number-into-star-rating-display-using-jquery-and-css
<span class="stars">4.8618164</span>
<span class="stars">2.6545344</span>
<span class="stars">0.5355</span>
<span class="stars">8</span>
*/
            $.fn.stars = function() {
    return $(this).each(function() {
        // Get the value
        var val = parseFloat($(this).html());
        // Make sure that the value is in 0 - 5 range, multiply to get width
        var size = Math.max(0, (Math.min(5, val))) * 16;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
        $(this).html($span);
    });
}
            
            $(function() {
    $('span.stars').stars();
});
            var originalValue = Number($(".stars").text());
            $("#star1,#star2,#star3,#star4,#star5").mouseleave(function() {
                var width = originalValue*16 + "px";
                
                $(".stars").html('<span style="width:' + width + '\"' + "</span>");
            });
            
            $("#star1,#star2,#star3,#star4,#star5").mouseenter(function() {
               var numberOfStar = Number(this.id.charAt(this.id.length-1));
               
               
            if(numberOfStar == 1) {
                $(".stars").html('<span style="width: 16px;"></span>');
            }
                
           if(numberOfStar == 2) {
                $(".stars").html('<span style="width: 32px;"></span>');
            }     
           
           if(numberOfStar == 3) {
                $(".stars").html('<span style="width: 48px;"></span>');
            }    
                
            if(numberOfStar == 4) {
                $(".stars").html('<span style="width: 64px;"></span>');
            }  
                
            if(numberOfStar == 5) {
                $(".stars").html('<span style="width: 80px;"></span>');
            }      
                
            });
            
            $("#star1,#star2,#star3,#star4,#star5").click(function() {
                var numberOfStar = Number(this.id.charAt(this.id.length-1));
              
                
            });
            
             $("#star1,#star2,#star3,#star4,#star5").click(function() {
               var numberOfStar = Number(this.id.charAt(this.id.length-1));
               
               
           
                
            });
            
        function insertRating(rating) {
            var id = <?php
                
                if (isset($_GET["id"]) && $validateURL->isValidIdUrl($_GET["id"])) {
                    echo $_GET["id"];
                }
                else {
                    echo $review->getLastId();
                }
                    
                
                
                ?>;
                var queryString = "userRating=" + rating +"&id=" + id;
                var request;
                request = $.ajax({
                    url:"rateReview.php",
                    type: "POST",
                    data: queryString,
               });
                
            request.done(function(response) {
                    $("#rating").text("RATING " + response + " OUT OF 5");
              
               });
                                        }
            
            $("#star1,#star2,#star3,#star4,#star5").click(function() {
                var rate = Number(this.id.charAt(this.id.length-1));
              insertRating(rate);
            });
      
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
    
    
    <div class = "ad-images">
      
          
      <!-- use js to calculate the height of the image -->    
      <img src = http://www.publicdomainpictures.net/pictures/10000/nahled/1489-1248446570Quce.jpg>
          
      <img src = http://www.publicdomainpictures.net/pictures/10000/nahled/1489-1248446570Quce.jpg>
          
      <img src = http://www.publicdomainpictures.net/pictures/10000/nahled/1489-1248446570Quce.jpg>
        
      <img src = http://www.publicdomainpictures.net/pictures/10000/nahled/1489-1248446570Quce.jpg>
      
      </div>
    
  <div class = "review">
      
      
      
      
      
      <div class = "review-head">
      AF MAG: REVIEWS/PREVIEWS
        </div>
    <?php
    if (isset($_GET["id"]) && $validateURL->isValidIdUrl($_GET["id"])) {
        $id = $review->sanitizeDatabaseInput($_GET["id"]);
      $review->displayReview($id);
    }
      else {
          $review->displayReview($review->getLastId());
      }
      
      
      
    ?>
    
    
    
 </div>
         
     
    
     <div class = "separation">
       
    </div>
        
    
   <div class = "comment-section">
    <div class = "comment-intro">Share Your Thoughts</div>
    <?php
       if ($session->is_session_started()) {
           $comments->allowUserComments();
       }
       else {
           $comments->allowStrangerComments();
       }
       
    ?>
       
    <div class = "article-comments">
    
       
       
    </div>
    
    </div>
    
    
    
    <div class = "separation">
       
    </div>

    
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