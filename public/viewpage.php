<?php

// Load all application files and configurations

require($_SERVER[ 'DOCUMENT_ROOT' ] '../includes/db_connect.php');

// Include the HTML layout class

include('../template/Layout.php');

// Connect to the database

include('../includes/db_connect.php');

// Initialize variables

$requestType = $_SERVER[ 'REQUEST_METHOD' ];

// Generate the HTML for the top of the page

Layout::pageTop('Layout.php');

// Page content goes here

?>
<div class="container top25">

    <div class="col-md-8">

        <section class="content">



            <?php

            if ( $requestType == 'GET' ) {

//

                $sql = 'select * from posts where id = ' . $_GET['id'];

                $result = $db->query($sql);

                $row = $result->fetch();

                //News::story($row);

                //showUpdateForm($row);

                $id = $row['id'];

                $title = $row['title'];

                $body = $row['content'];

                $startDate = $row['startDate'];

                $endDate = $row['endDate'];
				
				 echo <<<postform

                <form id="createPostForm" action='viewpage.php' method="POST" class="form-horizontal">

        <fieldset>





            <!-- Form Name -->

            <legend>view page</legend>

  <input type="hidden" name="id" value=$id>



            <!-- Text input-->

            <div class="form-group">

                <label class="col-md-3 control-label" for="title">Title = $title</label>

            </div>



            <!-- Textarea -->

            <div class="form-group">

                <label class="col-md-3 control-label" for="body">Body = $body</label>

            </div>



            <!-- Text input-->

            <div class="form-group">

                <label class="col-md-3 control-label" for="startDate">Start Date = $startDate</label>

            </div>



            <!-- Text input-->

            <div class="form-group">

                <label class="col-md-3 control-label" for="endDate">End Date = $endDate</label>

            </div>


                -->



        </fieldset>

    </form>
	<h4><a href="updatePost.php?id=$id">Edit</a>

postform;
} elseif ( $requestType == 'POST' ) {

                //Validate data

                // Save data

                $id = $_POST['id'];

                $title = htmlspecialchars($_POST['title'], ENT_QUOTES);

                $body = htmlspecialchars($_POST['body'], ENT_QUOTES);



                //  echo '<pre>' . print_r($_POST) . '</pre>';

                $sql = "update posts set title = '$title', body = '$body' where id = $id;";

                $result = $db->query($sql);

            }

            ?>











<?php

// Generate the page footer

Layout::pageBottom();

?>