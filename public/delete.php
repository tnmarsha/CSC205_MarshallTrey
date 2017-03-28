<?php

/*

DELETE.PHP

Deletes a specific entry from the 'players' table

*/



// connect to the database

include('../includes/db_connect.php');



// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['user_id']) && is_numeric($_GET['user_id']))

{

// get id value

$id = $_GET['user_id'];



// delete the entry

$result = $db->query("DELETE FROM posts WHERE user_id=$id")

or die(mysql_error());



// redirect back to the view page

header("Location: viewpage.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: view.php");

}



?>


