<?php
//session_start();
//if(!isset($_SESSION['user_id'])){
   // header('Location: login.php');
	//exit();

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
//get record of database
$record_count = $db->query("SELECT * FROM posts");
// amount displayed 
$per_page = 2;
//number of pages
$pages = ceil($record_count->num_rows/$per_page);
// get page number
if (isset($_GET['p']) && is_numeric($_GET['p'])){
	$page = $_GET['p'];
}else{
	$page =1;
}
if ($page<=0)
	$start = 0;
else
	$start = $page * $per_page - $per_page;
$prev = $page - 1;
$next = $page + 1;

$query = $db->prepare("SELECT post id, title, body, startdate, enddate, 
category From posts INNER JOIN category ON category.category_id=posts.category_id limit $start,$per_page");
$query->execute();
$query->bind_result($post_id, $title, $body, $startdate, $enddate, $category);
?>

    <div id="mainContent"> 
        <table>
            <tr>
			    <td>Total Blog Post</td>
                <td><?php echo $post_count->num_rows?>
            </tr>
			<tr>
                <td>Total Comments</td>
                <td><?php echo $comment_count->num_rows?>
            </tr>
        </td>
		</table>
		<div id="categoryForm">
		    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		        <label for="category"> Add New Category</label><input type="text" name="newCategory"/><input type= "submit" name=
			    "submit" value="submit"/>
		    </form>	
        </div>	
    </div>	
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9">
<!--[if it IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></head>script>
<![endif]-->
<script src="http://code.jquery.com/jquery-1.5.min.js"></script>
</head>
<style>
#container{
	margin:auto;
	width:800px;
</style>
<body>
<div id="container">
    <?php
	    while($query->fetch()):
	    $lastspace = strpos($body, ' ');
	?>
	<article>
	<h2><?php echo $title?></h2>
	<p><?php echo $body, "<a href='post.php?id=$post_id'>..</a>"?></p>
	<p>Startdate: <?php echo $startdate?></p>
	<p>Enddate: <?php echo $enddate?></p>
	<p>Category: <?php echo $category?>
	</article>
<?php endwhile?>

<?php
    if($prev > 0){
		echo "<a href='index.php?p=$prev'>Prev</a>";
	}
	if($page < $pages) {
		echo "<a href='index.php?p=$next'>Next</a>";
	}
?>
</div>
</body>
</html>

<?php	
Layout::PageBottom();
?>