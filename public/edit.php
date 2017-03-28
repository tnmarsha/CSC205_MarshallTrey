<?php

/*

EDIT.PHP

Allows user to edit specific entry in database

*/



// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($id, $title, $body, $startdate, $enddate, $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>Edit Post</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<input type="hidden" name="user_id" value="<?php echo $id; ?>"/>

<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>

<strong>Title: *</strong> <input type="text" name="title" value="<?php echo $title; ?>"/><br/>

<strong>Body: *</strong> <input type="text" name="body" value="<?php echo $body; ?>"/><br/>

<strong>Startdate: *</strong> <input type="text" name="startdate" value="<?php echo $startdate; ?>"/><br/>

<strong>Enddate: *</strong> <input type="text" name="enddate" value="<?php echo $enddate; ?>"/><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}







// connect to the database

include('../includes/db_connect.php');



// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{

// confirm that the 'id' value is a valid integer before getting the form data

if (is_numeric($_POST['user_id']))

{

// get form data, making sure it is valid

$id = $_POST['user_id'];

$title = mysql_real_escape_string(htmlspecialchars($_POST['title']));

$body = mysql_real_escape_string(htmlspecialchars($_POST['body']));

$startdate = mysql_real_escape_string(htmlspecialchars($_POST['startdate']));

$enddate = mysql_real_escape_string(htmlspecialchars($_POST['enddate']));

// check that title/body/startdate/enddate fields are filled in

if ($title == '' || $body == '' || $startdate == ''|| $enddate == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



//error, display form

renderForm($id, $title, $body, $startdate, $enddate, $error);

}

else

{

// save the data to the database

$db->query("UPDATE players SET title='$title', body='$body, startdate='$startdate,  enddateate='$enddate ' WHERE user_id='$id'")

or die(mysql_error());



// once saved, redirect back to the view page

header("Location: viewpage.php");

}

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['user_id']) && is_numeric($_GET['user_id']) && $_GET['user_id'] > 0)

{

// query db

$id = $_GET['user_id'];

$result = $db->query("SELECT * FROM players WHERE user_id=$id")

or die(mysql_error());

$row = $result->fetch_array();



// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db

$title = $row['title'];

$body = $row['body'];

$startdate = $row['startdate'];

$enddate = $row['enddate'];
// show form

renderForm($id, $title, $body, $startdate, $enddate, '');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>