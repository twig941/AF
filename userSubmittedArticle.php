<?php
require_once"init.php";
$userReview = new Reviews("localhost", "AlexG", "Ducktalesz1", "THE_ARTISTS_FORUM");
//$userReview->createImageTable();
echo $_FILES["userFiles"]["name"][0]

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
    
<script>
    /*creates how the article will look like */
    function generateView() {
      var currentText = $("#ta1").val();
     $(".output-area").html(currentText);
    }
    
    function submitFiles() {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(xhttp.responseText);
    }
  };
  xhttp.open("POST", "submitFiles.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();

    
    }
   
    
$(document).ready(function() {
    
window.selWrapBold = function(id) { selWrap(id,'<b>','</b>'); };
window.selWrapItalic = function(id) { selWrap(id,'<i>','</i>'); };
            window.selWrapImg = function(id) { selWrap(id,'<img class = "img-responsive" src = "','">'); };
window.selWrap = function(id,startTag,endTag) {
    let elem = document.getElementById(id);
    let start = elem.selectionStart;
    let end = elem.selectionEnd;
    let sel = elem.value.substring(start,end);
    if (sel==='') return;
    let replace = startTag+sel+endTag;
    elem.value =  elem.value.substring(0,start)+replace+elem.value.substring(end);
    elem.select();
    elem.setSelectionRange(start,start+replace.length);
} // end selWrap()
    
    
    $("#ta1").keyup(function(e) {
        //enter code is 13
            if(e.which == 13) {
               var currentText = $("#ta1").val();
               $("#ta1").val(currentText + "<br>");
            }
            
    });
    
    /*add more inputs */
    var numberOfAllowed = 15;
    var fileCount = 1;
    $(".addMoreInputsButton").click(function() {
        if ((fileCount < numberOfAllowed)) {
            $(".fileContainer").append('<input id = "userImages" type = "file" name = "userFiles[]">');
        }
        else {
            alert("Maxiumum number of inputs reached");
        }
        
        fileCount++;
    });
    
});
    
</script>
    
    
<title> Login </title>
</head>
<body>
    <div id = "demo">default</div>
    <form method = "POST" enctype ="multipart/form-data" id = "userImages"> 
    <label>Add An Image From Your Computer</label>
    <div class = "fileContainer">
    <input id = "userImages" type = "file" name = "userFiles[]">
    
    </div>
    <div class = "addMoreInputsButton">
       Add Another Input
        
    </div>
        <input type = "submit" value = "submit" name = "fileSubmit" onclick="submitFiles()">
        <br>
    </form>
    
<form method = "POST" action = "" id ="userArticleForm">
<div class="form-group">
      <label>Title Of Article</label>
      <input type="text" class="form-control" placeholder="Article Title">
    </div>
    <!--next input would be the authors name, but this can be obtained from the database when the user first signed in -->
    <div class="form-group">
      <label>Who is This For?</label>
      <input type="text" class="form-control" placeholder="Who is this for?">
    </div>
<div class="form-group">
      <label>Editors</label>
      <input type="text" class="form-control" placeholder="Who editied the article">
    </div>    
    <div class="form-group">
      <label>Photo Credit</label>
      <input type="text" class="form-control" placeholder="credit for the photo">
    </div> 

<div class="form-group">

<div class = "insert-item-bar">
<ul>
<li onclick="selWrapImg('ta1')">Add an Image from Online</li>    
    <li onclick="selWrap('ta1', '<figure> <img src=', '><figcaption><i>The caption goes here</i></figcaption></figure>')">Test</li>      
</ul>    
    
    
    
</div>
    
    
    
<label>Article Content</label>
    <div class = "view">
    
    </div>
    
    <!-- this textarea will go into the database  -->
<textarea id = "ta1" onkeyup = "generateView()">
</textarea>
    
</div>
    
    <br>
    <button type="submit" class="btn btn-default">Submit</button>
    

  
    
    
    
</form>    
    
    
    <div> How it Looks </div>
    <div style = "text-align:center;" class = "output-area">
    
    
    
    </div>
</body>










</html>