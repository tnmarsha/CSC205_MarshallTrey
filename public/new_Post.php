<?php
session_start();
include('../includes/db_connect.php');
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
	exit();
}
if(isset($_POST['submit'])){
	$target = $_SERVER[ 'DOCUMENT_ROOT' ]. '/public/asset/img/'.$_FILES['image']['name'];
    $image= $_FILES['image']['name'];
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
	if($title && $body && $category && $startdate && $enddate && $image){
	  $query = $db->query("INSERT INTO posts (user_id, title, body, category_id, posted, startdate, enddate, image)VALUES('$user_id','$title', '$body','$category', '$date', '$startdate', '$enddate', '$image')");
	  if($query){
		  

		  echo "post added";
	  }else{
		echo "error";
	  }
	}else{
	    echo "missing data";
	}	
	if ( move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		echo "image uploaded success";
	}else{
		echo "there was a problem";
	}
}
include('../template/Layout.php');
Layout::pageTop('Layout.php');
?>


</head>
<body>
    <div id = "wrapper">
	    <div id = "content">
	        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">	
			     <label>Image:</label><input type="file" name="image" />
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
</body>
</html>	
<?php	
Layout::PageBottom();
?>
			