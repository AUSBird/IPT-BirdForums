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
    <link href="Protected/css/Topic.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <title>Bird Forums - Topic Name</title>
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
                    <h4><b><a href="">Bird Forums</a> -> <a href="">Test Forum</a> -> <a href="">Topic 1</a></b></h4>
                    <table class="table Display-Topic">
                        <thead>
                        <tr>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        date_default_timezone_set("Australia/Brisbane");

                        $page = 1;
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        }
                        if (!isset($_GET['topic'])) {
                            exit();
                        }

                        $display = 30;
                        $page_Count = 1;

                        $display_StartLimit = ($display * $page) - 30;
                        $display_EndLimit = $display_StartLimit + 30;
                        $display_Total = 1;

                        // Loads Connection Settings
                        include "Protected/SQL Connection Variables.php";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $Topic_Count = "SELECT Count(RID) AS Count FROM Replys WHERE TID = " . $_GET["topic"];
                        $Topic_Count_result = $conn->query($Topic_Count);

                        if ($Topic_Count_result->num_rows == 1) {
                            // output data of each row
                            $row = $Topic_Count_result->fetch_assoc();

                            $display_Total = $row["Count"];
                            $page_Count = ceil($display_Total / $display);
                        } else {

                        }

                        $Topic = "SELECT Topic_Name, Topic_Description, Topic_Date, Topic_Views FROM `Topics` WHERE TID = " . $_GET['topic'];
                        $Topic_result = $conn->query($Topic);

                        if ($Topic_result->num_rows > 0) {
                            // output data of each row
                            while ($row = $Topic_result->fetch_assoc()) {
                                echo '<tr> <th colspan="2" class="TopicHeaderDiv"><span class="badge TopicHeader">';
                                echo $row["Topic_Name"];
                                echo '; ';
                                echo $row["Topic_Description"];
                                echo '</span> </th> </tr> <!-- Topic Info -->';

                                echo '<tr> <th colspan="2">';
                                echo '<span class="Left">Topic Started: ';
                                echo $row["Topic_Date"];
                                echo ' (Views: ';
                                echo $row["Topic_Views"];
                                echo ')</span>';// View and Post Date Here
                                echo '<span class="Right">Edit Topic Title</span>';// Button to edit topic here
                                echo '</th> </tr> <!-- Topic Info -->';
                            }
                        } else {

                        }

                        $Post = "SELECT r.RID, r.UID, r.TID, r.Reply_Content, r.Reply_Date, u.Account_Username, u.Profile_Pic, u.Account_Created, u.User_Signature, u.User_LastSeen FROM Replys r LEFT JOIN Users u ON r.UID=u.UID WHERE r.TID = " . $_GET['topic'] . " LIMIT " . $display_StartLimit . ", " . $display_EndLimit;
                        $Post_result = $conn->query($Post);
                        $Post_number = ($display_StartLimit + 1);

                        if ($Post_result->num_rows > 0) {
                            while ($row = $Post_result->fetch_assoc()) {
                                echo '<tr> <td rowspan="1" class="UserCard Left"> <div class="UserName"><b>';
                                echo $row["Account_Username"];
                                echo '</b></div></td> <td class="ContentCard">';
                                echo '<div class="Left">';
                                echo 'Posted: ';
                                echo $row["Reply_Date"];
                                echo '</div> <div class="Right">';
                                echo 'Post #';
                                echo $Post_number;
                                echo '</div> </td> </tr> <!-- Post Info -->';

                                echo '<tr> <td class="UserCard" rowspan="2"> <div class="Left ProfileCard"><img class="ProfilePic" src="';
                                echo $row["Profile_Pic"];
                                echo '"/></div> <div class="Clear UserInfo Overflow">
                                    <span class="badge UserInfoBadge" style="background:#D7342A;">Owner</span>
                                    <span class="badge UserInfoBadge" style="background:#1A7939;">Admin</span>
                                    <span class="badge UserInfoBadge" style="background:#195080;">Moderator</span>
                                    <span class="badge UserInfoBadge" style="background:#979C9F;">Member</span>
                                </div> <div class="Clear UserInfo"> <p><b>Date Joined: </b> ';
                                echo $row["Account_Created"];
                                echo '</p><p><b>User ID: </b> ';
                                echo $row["UID"];
                                echo '</p> </div> <div class="Clear UserInfo">
                                    <span class="badge UserInfoBadge " style="background:green;">No Warnings</span> </div> </td> <td class="ContentCard">';
                                echo $row["Reply_Content"];
                                echo '</td> </tr> <!-- Post and User Info -->';

                                echo '<tr> <td class="ContentCard">';
                                echo $row["User_Signature"];
                                echo '</td> </tr> <!-- Post Signature -->';

                                echo '<tr> <td rowspan="1" class="UserCard Left"> <div class="PostControls"> <button type="button" class="btn btn-sm btn-default" style="color:';

                                if (strtotime($row["User_LastSeen"]) > time() - (60 * 30)) {
                                    echo 'green;">PM | Online';
                                } else {
                                    echo 'red;">PM | Offline';
                                }

                                echo '</button> <button type="button" class="btn btn-sm btn-default">Profile</button> </div> </td>';
                                echo '<td class="ContentCard"> <div class="Left"> <button type="button" class="btn btn-sm btn-default">Edit Post</button> </div> <div class="Right">
                                    <button type="button" class="btn btn-sm btn-danger glyphicon glyphicon-flag" style="background: #720001; border-color: #720001;"></button>
                                    <button type="button" class="btn btn-sm btn-default">Quote</button>
                                    <button type="button" onclick="topFunction()" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-menu-up"/></button> </div>
                                    </td> </tr> <!-- Post Controls & User Opperations -->';

                                echo '<tr> <th colspan="2" class="TopicSpacer"></th> </tr> <!-- Post Separator -->';

                                $Post_number++;
                            }
                        }

                        $conn->close();

                        if ($page_Count >= 2) {
                            echo '</tbody> </table> <div class="PageSelecterBar">';

                            if (($_GET["page"] - 1) >= 1) {
                                echo '<a href="Topic.php?topic=' . $_GET["topic"] . '&page=' . ($_GET["page"] - 1) . '" class="btn btn-xs btn-default PageSelecter"><span class="glyphicon glyphicon-menu-left"/></a>';
                            } else {
                                echo '<a href="Topic.php?topic=' . $_GET["topic"] . '&page=' . ($_GET["page"]) . '" class="btn btn-xs btn-default PageSelecter"><span class="glyphicon glyphicon-menu-left"/></a>';
                            }

                            $i = 1;
                            while ($i <= $page_Count) {
                                if ($i == $_GET["page"]) {
                                    echo '<a href="Topic.php?topic=' . $_GET["topic"] . '&page=' . $i . '" class="btn btn-xs btn-default PageSelecter-Current">' . $i . '</a>';
                                } else {
                                    echo '<a href="Topic.php?topic=' . $_GET["topic"] . '&page=' . $i . '" class="btn btn-xs btn-default PageSelecter">' . $i . '</a>';
                                }

                                $i++;
                            }

                            if (($_GET["page"] + 1) <= $page_Count) {
                                echo '<a href="Topic.php?topic=' . $_GET["topic"] . '&page=' . ($_GET["page"] + 1) . '" class="btn btn-xs btn-default PageSelecter"><span class="glyphicon glyphicon-menu-right"/></a>';
                            } else {
                                echo '<a href="Topic.php?topic=' . $_GET["topic"] . '&page=' . ($_GET["page"]) . '" class="btn btn-xs btn-default PageSelecter"><span class="glyphicon glyphicon-menu-right"/></a>';
                            }
                            echo 'Displaying Post: ' . ($display_StartLimit + 1) . ' to ' . ($display_EndLimit + 1) . ' (' . $display_Total . ')</div>';
                        }
                        ?>

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