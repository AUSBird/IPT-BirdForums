<!doctype html>
<html>
<head>
    <!-- BootStrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Material Design (Google) -->
    <link rel="stylesheet" href="https://fonts.googleapi.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <!-- Custom CSS -->
    <link href="Protected/css/Main.css" rel="stylesheet" type="text/css"/>
    <link href="Protected/css/index.css" rel="stylesheet" type="text/css">
    <link href="Protected/css/Topic.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <title>Bird Forums - Login</title>
</head>

<body>
<?php
include_once "Protected/NavBar.php";
?>

<script>
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-lg-12">
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

            <div class="alert alert-success alert-dismissible" role="alert">
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
            </div>

            <div class="row">
                <div class="col-lg-12 Background">

                </div><!--/.col-xs-6.col-lg-4-->
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
						Topic Badges
<span class="badge UserInfoBadge " style="background:#D7342A;">Owner</span>      <-- Owner Post
<span class="badge UserInfoBadge " style="background:#1A7939;">Admin</span>      <-- Admin Post
<span class="badge UserInfoBadge " style="background:#195080;">Moderator</span>  <-- Mod Post
<span class="badge UserInfoBadge " style="background:#979C9F;">Member</span>     <-- Member Post

						ModInfo Badges
<span class="badge UserInfoBadge " style="background:green;">No Warnings</span>  <-- No Warn
<span class="badge UserInfoBadge " style="background:gold;">1 Warning</span>     <-- Low Warn
<span class="badge UserInfoBadge " style="background:orange;">3 Warnings</span>  <-- Med Warn
<span class="badge UserInfoBadge " style="background:red;">5 Warnings</span>     <-- High Warn

                        Opperation Buttons
<button type="button" class="btn btn-sm btn-default" style="color: red;">PM | Offline</button>   <-- Offline PM
<button type="button" class="btn btn-sm btn-default" style="color: green;">PM | Online</button>  <-- Offline PM

<button type="button" class="btn btn-sm btn-default">Profile</button>                            <-- Profile
<button type="button" class="btn btn-sm btn-default">Edit Post</button>                          <-- Edit

<button type="button" class="btn btn-sm btn-danger" style="background: #720001; border-color: #720001;">Report</button>			   <-- Report Post
<button type="button" class="btn btn-sm btn-default">Quote</button>                              								   <-- Quote Post
<button type="button" onclick="topFunction()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-menu-up"/></button>  <-- Return to top

						Template Profile Pics
<div class="Left"><img class="ProfilePic" src="http://assets.pokemon.com/assets/cms2/img/pokedex/full/133.png"/></div>
-->