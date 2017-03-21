<?php
if(!isset($_GET['id'])){
	die('1');
	header('Location: index.php');
	exit();
}else{
	$id = $_GET['id'];
}
include('../includes/db_connect.php');
if (!is_numeric($id)){
	die('2');
	header('Location: index.php');
}
$sql = "SELECT title, body FROM posts WHERE post=$id";
// die($sql);
$query = $db->query($sql);
if($query->num_rows !=1){
	
	header('Location: index.php');
	exit();
}
if(isset($_POST['submit'])){
  	$email = $_POST['email'];
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	if($email && $name  && $comment){
		//
		$email = $db->real_escape_string($email);
		$name = $db->real_escape_string($name);
		$id = $db->real_escape_string($id);
		$comment = $db->real_escape_string($comment);
		if($addComment = $db->prepare("INSERT INTO comments(name, post_id, email_add, comment) VALUES (?,?,?,?)")){
			$addComment->bind_param('ssss', $id, $name, $email, $comment);
			$addComment->execute();
			echo "Thank you comment was added";
			$addComment->close();
		}else{
			echo"Error";
		}	
	}else{
        echo "ERROR";
    }		
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9">
<script src="http://code.jquery.com/jquery-1.5.min.js"></script>
<style type = "text/css">
#container{
	width:800px;
	padding:5px;
	margin:auto;
}
label{
    display:block;	
}
</style>
</head>
<body>
<div id="container">
    <div id="post">
    <?php
	$row = $query->fetch_object();
	echo "<h2>".$row->title."</h1>";
	echo "<p>".$row->body."</p>";
?>
 </div>
 <hr/>
 <div id = "add-comments">
    <form action ="<?php echo $_SERVER['PHP_SELF']."?id=$id"?> " method="post"
	    <div>
		    <label>Email Address</label><input type="text" name = "email"/>
		</div>
		<div>
		    <label>Name</label><input type = "text" name = "name"/>
		</div>
		<div>
		    <label>Comment</label><textarea name = "comment"></textarea>
		</div>
		<input type = "submit" name = "submit" value="submit" />
	</form>
	    <div>
		<hr/>
		<div id = "Comments">
		   <?php
		   $query = $db->query("SELECT * FROM comments WHERE post_id='$id' ORDER BY comment_id DESC ");
		   while($row = $query->fetch_object()):
		   ?>
		   <div>
		       <h5><?php echo $row->name?></h5>
			   <blockquote><?php echo $row->comment?></blockquote>
		   </div>
		   <?php endwhile;?>
		</div>

 
 </div>


