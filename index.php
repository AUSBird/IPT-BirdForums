<!doctype html>
<html>
<head>
    <!-- Links the main style sheet -->
    <link href="Protected/css/Main.css" rel="stylesheet" type="text/css"/>
    <link href="Protected/css/index.css" rel="stylesheet" type="text/css"/>

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <title>BirdForums - Home</title>
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
            <div class="col-xs-6 col-lg-offset-0 col-lg-12" style="text-align: center;">
                <h2>Most Active Topics</h2>
            </div>
            <div class="row">
                <div class="col-xs-6 col-lg-4">
                    <h2>Topic 1</h2>
                    <p>Topic Description</p>
                    <p><a class="btn btn-default" href="#" role="button">View Topic »</a></p>
                </div><!--/.col-xs-6.col-lg-4-->
                <div class="col-xs-6 col-lg-4">
                    <h2>Topic 2</h2>
                    <p>Topic Description </p>
                    <p><a class="btn btn-default" href="#" role="button">View Topic »</a></p>
                </div><!--/.col-xs-6.col-lg-4-->
                <div class="col-xs-6 col-lg-4">
                    <h2>Topic 3</h2>
                    <p>Topic Description</p>
                    <p><a class="btn btn-default" href="#" role="button">View Topic »</a></p>
                </div><!--/.col-xs-6.col-lg-4-->
                <div class="col-xs-6 col-lg-4">
                    <h2>Topic 4</h2>
                    <p>Topic Description</p>
                    <p><a class="btn btn-default" href="#" role="button">View Topic »</a></p>
                </div><!--/.col-xs-6.col-lg-4-->
                <div class="col-xs-6 col-lg-4">
                    <h2>Topic 5</h2>
                    <p>Topic Description</p>
                    <p><a class="btn btn-default" href="#" role="button">View Topic »</a></p>
                </div><!--/.col-xs-6.col-lg-4-->
                <div class="col-xs-6 col-lg-4">
                    <h2>Topic 6</h2>
                    <p>Topic Description</p>
                    <p><a class="btn btn-default" href="#" role="button">View Topic »</a></p>
                </div><!--/.col-xs-6.col-lg-4-->
            </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
    </div><!--/row-->
    <hr>

    <footer>
        <p>© Tasman Leach 2017 </p>
    </footer>

</div><!--/.container-->
</body>
</html>

<!-- http://getbootstrap.com/components/ -->