<?php
if(!isset($_GET['id'])){
	header('Location: index.php');
	exit();
}else{
	$id = $_GET['id'];
}
include('../includes/db_connect.php');	
if (!is_numeric($id)){
	header('Location: index.php');
}
$sql = "SELECT title, body FROM posts WHERE post_id='$id'";
$query = $db->query($sql);
if($query->num_rows !=1){
	header('Location: index.php');
	exit();
}  	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9">
<script src="http://code.jquery.com/jquery-1.5.min.js"></script>
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


