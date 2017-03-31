<?php

/*

DELETE.PHP

Deletes a specific entry from the 'players' table

*/



// connect to the database

session_start();
include('../includes/db_connect.php');
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
	exit();
}



// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['post']) && is_numeric($_GET['post']))

{

// get id value

$id = $_GET['post'];



// delete the entry

$result = $db->query("DELETE FROM posts WHERE post=$id")

or die(mysql_error());



// redirect back to the view page

header("Location: view.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: view.php");

}



?>


