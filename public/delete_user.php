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

if (isset($_GET['user_id']) && is_numeric($_GET['user_id']))

{

// get id value

$id = $_GET['user_id'];



// delete the entry

$result = $db->query("DELETE FROM user WHERE user_id=$id")

or die(mysql_error());



// redirect back to the view page

header("Location: admin.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: admin.php");

}



?>
