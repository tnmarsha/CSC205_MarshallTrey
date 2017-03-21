<?php

// Load all application files and configurations

require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');

// Include the HTML layout class

include('../templates/Layout.php');

// Connect to the database

$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Initialize variables

$requestType = $_SERVER['REQUEST_METHOD'];

// Generate the HTML for the top of the page

Layout::pageTop('Layout.php');

// Page content goes here

?>

    <div class="container top25">

        <div class="col-md-8">

            <section class="content">



                <?php

                if ($requestType == 'GET') {

//

                    $sql = 'select * from posts where id = ' . $_GET['id'];

                    $result = $db->query($sql);

                    $row = $result->fetch();

                    $id = $row['id'];

                    $title = $row['title'];

                    $body = $row['body'];

                    $startDate = $row['startDate'];

                    $endDate = $row['endDate'];

                  



                    echo <<<postform

                <form id="createPostForm" action='updatePost.php' method="POST" class="form-horizontal">

        <fieldset>





            <!-- Form Name -->

            <legend>Update Post</legend>

  <input type="hidden" name="id" value=$id>



            <!-- Text input-->

            <div class="form-group">

                <label class="col-md-3 control-label" for="title">Title</label>

                <div class="col-md-8">

                    <input id="title" name="title" type="text" placeholder="post title" value="$title" class="form-control input-md" required="">

                </div>

            </div>



            <!-- Textarea -->

            <div class="form-group">

                <label class="col-md-3 control-label" for="body">Body</label>

                <div class="col-md-8">

                    <textarea class="form-control" id="body" name="body">$body</textarea>

                </div>

            </div>



            <!-- Text input-->

            <div class="form-group">

                <label class="col-md-3 control-label" for="startDate">Effective Date</label>

                <div class="col-md-8">

                    <input id="startDate" name="startDate" type="text" placeholder="effective date" value="$startDate" class="form-control input-md" required="">

                </div>

            </div>



            <!-- Text input-->

            <div class="form-group">

                <label class="col-md-3 control-label" for="endDate">End Date</label>

                <div class="col-md-8">

                    <input id="endDate" name="endDate" type="text" placeholder="end date" value="$endDate" class="form-control input-md">

                </div>

            </div>



                -->



            <!-- Button (Double) -->

            <div class="form-group">

                <label class="col-md-3 control-label" for="submit"></label>

                <div class="col-md-8">

                    <button id="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>

                    <button id="cancel" name="cancel" value="Cancel" class="btn btn-info">Cancel</button>

                </div>

            </div>



        </fieldset>

    </form>

postform;





                } elseif ($requestType == 'POST') {

                    //Validate data

                    // Save data

                    $id = $_POST['id'];

                    $title = htmlspecialchars($_POST['title'], ENT_QUOTES);

                    $body = htmlspecialchars($_POST['body'], ENT_QUOTES);



                    //echo '<pre>' . print_r($_POST) . '</pre>';



                    $sql = "update posts set title = '$title', body = '$body' where id = $id;";

                    $result = $db->query($sql);

                    header('Location: index.php');

                }

                ?>

            </section>

        </div>



    </div>





<?php

// Generate the page footer

Layout::pageBottom();