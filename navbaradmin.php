<?php
include './Dbconnection/dbconnect.php';
include './Dbconnection/dbh.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" href="./assets/css/stylesheetalumni.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main">

        <div class="side-navbar">
            <br><br><br>
            <p style="color:white ; padding-left: 15px; font-weight:bold; font-size:40px; font-family: Arial, Helvetica, sans-serif; ">Alumni Portal</p><br><br><br><br><br><br>
            <ul>
                <li>
                    <p style="padding-left:15px; padding-bottom:20px; font-size:large; font-weight:bold">ADMIN DASHBOARD
                    <p>
                </li><br>
                <li><a href="./posts.php">All Posts</a></li>
                <li><a href="./Pending_posts.php">Pending Posts</a></li>
                <li><a href="./Approved_post.php">Approved Posts</a></li>
                <li><a href="./Rejected_posts.php">Rejected Posts</a></li>
                <li>
                    <p style="padding-left:15px; padding-bottom:20px; font-size:large; font-weight:bold">MARKER DASHBOARD
                    <p>


                <li><a href="./markers.php">All Markers</a></li>
                <li><a href="./Pending_markers.php">Pending Markers</a></li>
                <li><a href="./Approved_markers.php">Approved Markers</a></li>
                <li><a href="./Rejected_markers.php">Rejected Markers</a></li>
            </ul>
        </div>
    </div>
</body>

</html>