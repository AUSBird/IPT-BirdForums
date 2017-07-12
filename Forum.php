<!doctype html>
<html>
<head>
    <!-- BootStrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link href="Protected/css/Main.css" rel="stylesheet" type="text/css"/>
    <link href="Protected/css/index.css" rel="stylesheet" type="text/css">
    <link href="Protected/css/Forum.css" rel="stylesheet" type="text/css">

    <meta charset="utf-8">
    <title>Bird Forums - Topic Name</title>
</head>

<body><?php
include_once "Protected/NavBar.php";
?>

<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9 col-lg-12">
            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
            </p>

            <div class="jumbotron">
                <h1>Bird Forums</h1>
                <p>Discuss Topics With People </p>
            </div>

            <?php
            //include_once "";
            ?>

            <!--<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <b>Success</b> Topic Posted.
            </div>

            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <b>Success</b> Reply Posted.
            </div>

            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <b>Welcome [Username]</b>, You have logged into your account...
            </div>

            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <b>Good bye [Username]</b>, You have logged out of your account...
            </div>

            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                Permission's Error
            </div>

            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                A Topic or Reply has been reported for moderation... Click to view Reports
            </div>-->

            <div class="row Display-Forum">
                <table class="table">
                    <tr>
                        <th>Topic Name</th>
                        <th>Topic Description</th>
                        <th>Created By</th>
                        <th>Last Post</th>
                    </tr>
                    <tr>
                        <td>Topic 5 Name <span class="badge" style="background:green;">New</span> <span class="badge"
                                                                                                        style="background:purple;">Pinned</span>
                        </td>
                        <td>Description Goes Here</td>
                        <td><a href="#">AssaultBird2454</a></td>
                        <td><a href="#">AssaultBird2454</a> @ [Time Stamp]</td>
                    </tr>
                </table>
                <br>
                <table class="table">
                    <tr>
                        <th>Topic Name</th>
                        <th>Topic Description</th>
                        <th>Created By</th>
                        <th>Last Post</th>
                    </tr>
                    <tr>
                        <td>Topic 1 Name <span class="badge" style="background:green;">New</span></td>
                        <td>Description Goes Here</td>
                        <td><a href="#">AssaultBird2454</a></td>
                        <td><a href="#">AssaultBird2454</a> @ [Time Stamp]</td>
                    </tr>
                    <tr>
                        <td>Topic 2 Name <span class="badge" style="background:orange;">Hot</span></td>
                        <td>Description Goes Here</td>
                        <td><a href="#">AssaultBird2454</a></td>
                        <td><a href="#">AssaultBird2454</a> @ [Time Stamp]</td>
                    </tr>
                    <tr>
                        <td>Topic 3 Name <span class="badge" style="background:green;">New</span> <span class="badge"
                                                                                                        style="background:orange;">Hot</span>
                        </td>
                        <td>Description Goes Here</td>
                        <td><a href="#">AssaultBird2454</a></td>
                        <td><a href="#">AssaultBird2454</a> @ [Time Stamp]</td>
                    </tr>
                    <tr>
                        <td>Topic 4 Name <span class="badge" style="background:green;">New</span> <span class="badge"
                                                                                                        style="background:red;">Reported</span>
                        </td>
                        <td>Description Goes Here</td>
                        <td><a href="#">AssaultBird2454</a></td>
                        <td><a href="#">AssaultBird2454</a> @ [Time Stamp]</td>
                    </tr>
                    <tr>
                        <td>Topic 6 Name <span class="badge" style="background:green;">New</span> <span class="badge"
                                                                                                        style="background:grey;">Locked</span>
                        </td>
                        <td>Description Goes Here</td>
                        <td><a href="#">AssaultBird2454</a></td>
                        <td><a href="#">AssaultBird2454</a> @ [Time Stamp]</td>
                    </tr>
                </table>
            </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
    </div><!--/row-->

    <hr>

    <footer>
        <p>© Tasman Leach 2017</p>
    </footer>

</div><!--/.container-->
</body>
</html>

<!--
<span class="badge" style="background:green;">New</span>      <-- New Post Avaliable
<span class="badge" style="background:orange;">Hot</span>     <-- Hot Post
<span class="badge" style="background:purple;">Pinned</span>  <-- Pinned Post
<span class="badge" style="background:grey;">Locked</span>    <-- Locked Post
<span class="badge" style="background:grey;">Hidden</span>    <-- Hidden Post

<span class="badge" style="background:red;">Reported</span>   <-- Reported Post or Reply
-->