<?php

/*

NEW.PHP

Allows user to create a new entry in the database

*/



// creates the new record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($username, $password, $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>New User</title>

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

<div>

<strong>UserName: *</strong> <input type="text" name="username" value="<?php echo $username; ?>" /><br/>

<strong>Password: *</strong> <input type="text" name="password" value="<?php echo $password; ?>" /><br/>

<p>* required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}









// connect to the database

session_start();
include('../includes/db_connect.php');
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
	exit();
}



// check if the form has been submitted. If it has, start to process the form and save it to the database

if (isset($_POST['submit']))

{

// get form data, making sure it is valid

$username = $db->real_escape_string(htmlspecialchars($_POST['username']));

$password =$db->real_escape_string(htmlspecialchars($_POST['password']));



// check to make sure both fields are entered

if ($username == '' || $password == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



// if either field is blank, display the form again

renderForm($username, $password, $error);

}

else

{

// save the data to the database

$db->query("INSERT user SET username='$username', password='$password'")

or die(mysql_error());



// once saved, redirect back to the view page

header("Location: admin.php");

}

}

else

// if the form hasn't been submitted, display the form

{

renderForm('','','');

}

?>