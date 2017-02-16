<?php

class layout
{
	
public static function pageTop($title)
{ 

echo <<<pageTop
<!DOCTYPE html>
<html>
<head>
<title>Diamond Life Post</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<head>
 <body>

    <div id ="container">
	   
    <ul class="w3-navbar w3-border w3-light-grey">
  <li><a href="#">Home</a></li>
  <li><a href="new_Post.php">Create New Post</a></li>
  <li><a href="#">Delete Post</a></li>
  <li><a href="logout.php">Log Out</a></li>
  <li><a href="#">Blog Home Page</a></li>
            </ul>
        </div>
<div id ="container">
	
pageTop;

}
public static function pageBottom()
{ 

echo <<<pageBottom
</div>
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
  <button class="w3-btn w3-disabled w3-padding-large w3-margin-bottom">Previous</button>
  <button class="w3-btn w3-padding-large w3-margin-bottom">Next »</button>
  <p>Powered by <a href="http://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>

</body>
</html>
}
pageBottom;

}
}
?>
