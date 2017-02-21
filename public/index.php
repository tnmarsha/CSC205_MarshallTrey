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

if(isset($_POST['submit'])){
	$newCategory = $_POST['newCategory'];
	if(!empty($newCategory)){
	    $sql = "INSERT INTO category (category) VALUES('".$newCategory."')";
	    $query = $db->query($sql);
		if($query){
		echo "New category added";
		}else{
            echo"Error";
		}			
	}else{
	echo 'Missing newCategory';
	}
}	
include('../template/Layout.php');
Layout::pageTop('Layout.php');

?>

    <div id="mainContent"> 
        <table>
            <tr>
			    <td>Total Blog Post</td>
                <td><?php echo $comment_count->num_rows?>
            </tr>
			<tr>
                <td>Total Comments</td>
                <td><?php echo $comment_count->num_rows?>
            </tr>
        </td>
		</table>
		<div id="categoryForm">
		<form action="<?php echo $_server['PHP_SELF']?>" method="post">
		    <label for="category"> Add New Category</label><input type="text" name="newCategory"/><input type= "submit" name=
			"submit" value="submit"/>
		</form>	
    </div>	
    </div>	
<?php	
Layout::PageBottom();
?>