<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
	exit();
}
include('../includes/db_connect.php');	
//post count
$post_count = $db->query("SELECT * FROM posts");
//comment count
$comment_count = $db->query("SELECT * FROM comments");
include('../template/Layout.php');
Layout::pageTop('Layout.php')

?>
