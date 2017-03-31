<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>View Users</title>

</head>

<body>



<?php
include('../template/Layout.php');
Layout::pageTop('Layout.php');
/*

VIEW.PHP

Displays all data from 'user' table

*/



// connect to the database

session_start();
include('../includes/db_connect.php');
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
	exit();
}



// get results from database

$result = $db->query("SELECT * FROM user")

or die(mysql_error());



// display data in table

echo "<p><b>View All</b>";



echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>ID</th> <th>Username</th> <th>Password</th> <th></th> <th></th></tr>";



// loop through results of database query, displaying them in the table

while($row = $result->fetch_array()) {



// echo out the contents of each row into a table

echo "<tr>";

echo '<td>' . $row['user_id'] . '</td>';

echo '<td>' . $row['username'] . '</td>';

echo '<td>' . $row['password'] . '</td>';

echo '<td><a href="edit_user.php?user_id=' . $row['user_id'] . '">Edit</a></td>';

echo '<td><a href="delete_user.php?user_id=' . $row['user_id'] . '">Delete</a></td>';

echo "</tr>";

}



// close table>

echo "</table>";

?>

<p><a href="new.php">Add a new record</a></p>



</body>

</html>