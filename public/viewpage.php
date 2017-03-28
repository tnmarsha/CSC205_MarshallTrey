<?php
include('../template/Layout.php');
Layout::pageTop('Layout.php');
/*

VIEW.PHP

Displays all data from 'players' table

*/



// connect to the database

include('../includes/db_connect.php');



// get results from database

$result = $db->query("SELECT * FROM posts")

or die(mysql_error());



// display data in table

echo "<p><b>View Post</b>";



echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>ID</th> <th>Title</th> <th>Body</th> <th>Startdate</th> <th>Enddate</th></tr>";



// loop through results of database query, displaying them in the table

while($row = $result->fetch_array()) {



// echo out the contents of each row into a table

echo "<tr>";

echo '<td>' . $row['user_id'] . '</td>';

echo '<td>' . $row['title'] . '</td>';

echo '<td>' . $row['body'] . '</td>';

echo '<td>' . $row['startdate'] . '</td>';

echo '<td>' . $row['enddate'] . '</td>';

echo '<td><a href="edit.php?user_id=' . $row['user_id'] . '">Edit</a></td>';

echo '<td><a href="delete.php?user_id=' . $row['user_id'] . '">Delete</a></td>';

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