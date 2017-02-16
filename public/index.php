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
    </div>		
<?php	
Layout::PageBottom();
?>