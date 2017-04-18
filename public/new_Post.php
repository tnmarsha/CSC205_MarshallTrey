<?php
session_start();
include('../includes/db_connect.php');
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
	exit();
}
if(isset($_POST['submit'])){
	//get the blog data
if(isset($_POST['submit'])){ 
    //stores uploaded image 
    $target = "images/".basename($_FILES['image']['name']);
	//get all the submitted data from the form
	$image = $_FILES['image']['name'];
	$text = $_POST['text'];
	$sql = "INSERT INTO images (image, text) VALUES('$image', '$text')";
	mysqli_query($db, $sql);///stores the submitted data into the database table
	// now lets move the uploaded image into the folder: img
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
	$msg = "image uploaded successfully";
}else{
	$msg = " there was a problem uploading image";


}
}

	$title = $_POST['title'];
	$body = $_POST['body'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$category = $_POST['category'];
	$title = $db->real_escape_string($title);
	$body = $db->real_escape_string($body);
	//print_r($_POST); die();
	$startdate = $db->real_escape_string($startdate);
	$enddate = $db->real_escape_string($enddate);
	// die($startdate);
	$user_id = $_SESSION['user_id'];
	$date = date('y-m-d G:i;s');
	$body = htmlentities($body);
	if($title && $body && $category && $startdate && $enddate){
	  $query = $db->query("INSERT INTO posts (user_id, title, body, category_id, posted, startdate, enddate)VALUES('$user_id','$title', '$body','$category', '$date', '$startdate', '$enddate')");
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
			    <input type="hidden" name="size" value="1000000" />
				<div>
				<input type="file" name="image"
				<div>
				<textarea name="text" cols="40" rows="4" placeholder="say something about image...."></textarea>
		        <label>Title:</label><input type="text" name="title" />
			    <label for ="body"> Body:</label>
			    <textarea name="body" cols=50 rows=10></textarea>
				<label>Startdate:</label><input type="text" name="startdate" />
				<label>Enddate:</label><input type="text" name="enddate" />
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
	    </div>
	</div>
</body>
</html>	
<?php	
Layout::PageBottom();
?>
			