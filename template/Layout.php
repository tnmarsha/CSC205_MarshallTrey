<!DOCTYPE html>
<html>
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
	<div id="main content">
	    <table>
	        <tr>
		        <td>Total Blog Post</td>
			    <td><?php echo $post_count->num_rows?></td>
		    </tr>	
		    <tr>
		        <td>Total Comments</td>
			    <td><?php echo $comment_count->num_rows?>
		    </tr>
        </td>		
	</div>
</body>

<title>Diamond Life Post</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>


</html>