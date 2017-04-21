<?php
include('../template/Layout.php');
Layout::pageTop('Layout.php');
/*

VIEW.PHP

Displays all data from 'players' table

*/



// connect to the database
session_start();
include('../includes/db_connect.php');
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
	exit();
}




// get results from database

$result = $db->query("SELECT * FROM posts")

or die(mysql_error());



// display data in table

echo "<p><b>View Post</b>";



echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>ID</th> <th>Title</th> <th>Body</th> <th>Startdate</th> <th>Enddate</th> <th>Image</th> </tr>";



// loop through results of database query, displaying them in the table

while($row = $result->fetch_array()) {



// echo out the contents of each row into a table

echo "<tr>";

echo '<td>' . $row['post'] . '</td>';

echo '<td>' . $row['title'] . '</td>';

echo '<td>' . $row['body'] . '</td>';

echo '<td>' . $row['startdate'] . '</td>';

echo '<td>' . $row['enddate'] . '</td>';

echo '<td><img src="/public/asset/img/'. $row["image"].'"width="100px"/></td>';

echo '<td><a href="edit.php?post=' . $row['post'] . '">Edit</a></td>';

echo '<td><a href="delete.php?post=' . $row['post'] . '">Delete</a></td>';

echo "</tr>";

}



// close table>

echo "</table>";

?>




</body>

</html>
<?php	
Layout::PageBottom();
?>