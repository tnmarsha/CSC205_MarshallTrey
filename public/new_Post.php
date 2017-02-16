<?php
include('../template/Layout.php');
Layout::pageTop('Layout.php');
?>


<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9">
<script src="http://code.jquery.com/jquery-1.5.min.js"></script>
<!--[if It IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
#wrapper{
	margin:auto;
	width:800px;
}
label{display:block}

</style>
</head>
<body>
    <div id = "wrapper">
	    <div id = "content">
	        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
		        <label>Title:</label><input type="text" name="title" />
			    <label for ="body"> Body:</label>
			    <textarea name="body" cols=50 rows=10></textarea>
			    <label> Category:</label>
			    <select name="category">
			        <?php  
					    $query = $db->query("SELECT * FROM categories");
						while($row = $query->fetch_object()){
						    echo "<option value='".$row->category_id."'>".$row->category."</option>";
						}
					?>
			    </select>
			    <br/>
			    <input type="submit" name="submit" value="Submit" />
		    </form>
	    </div>
	</div>
</body>
</html>	
			