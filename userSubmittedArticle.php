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
<label>Article Content</label>
<textarea>
</textarea>
</div>
    
    <br>
    <button type="submit" class="btn btn-default">Submit</button>
    

  
    
    
    
</form>    
</body>










</html>