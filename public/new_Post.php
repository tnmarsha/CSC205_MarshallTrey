<?php
session_start();
include('../includes/db_connect.php');
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
	exit();
}
if(isset($_POST['submit'])){
	//get the blog data
	$title = $_POST['title'];
	$body = $_POST['body'];
	$category = $_POST['category'];
	$title = $db->real_escape_string($title);
	$body = $db->real_escape_string($body);
	$user_id = $_SESSION['user_id'];
	$date = date('y-m-d G:i;s');
	$body = htmlentities($body);
	if($title && $body && $category){
	  $query = $db->query("INSERT INTO posts (user_id, title, body, category_id, posted) VALUES('$user_id','$tilte', '$body','$category', '$date')");
	  if($query){
		  echo "post added";
	  }else{
		echo "error";
	  }
	}else{
	    echo "missing data";
	}	
}
include('../template/Layout.php');
Layout::pageTop('Layout.php');
?>


</head>
<body>
    <div id = "wrapper">
	    <div id = "content">
	        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		        <label>Title:</label><input type="text" name="title" />
			    <label for ="body"> Body:</label>
			    <textarea name="body" cols=50 rows=10></textarea>
			    <label> Category:</label>
			    <select name="category">
			        <?php  
					    $query = $db->query("SELECT * FROM category");
						while($row = $query->fetch_object()){
						    echo "<option value='".$row->category_id."'>".$row->category."</option>";
						}  
					?>
			    </select>
			    <br/>
			    <input type="submit" name="submit" value="Submit"/>
		    </form>
	    </div>
	</div>
</body>
</html>	
			