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
</head>

<body>
    <div class="main">
        <div class="side-navbar">
            <p>SATSANGEE<br>ADMIN DASHBOARD</p>
            <ul style="margin-top: 70px;">
                <li class="pageLinks"><a href="./posts.php">All Posts</a></li>
                <li class="pageLinks"><a href="./Pending_posts.php">Pending Posts</a></li>
                <li class="pageLinks"><a href="./Approved_post.php">Approved Posts</a></li>
                <li class="pageLinks"><a href="./Rejected_post.php">Rejected Posts</a></li>
            </ul>
        </div>
    </div>

    <!-- Logout button at the bottom -->
    <div class="logout-container">
        <form action="./logout.php">
            <button class="logout-btn2">Logout</button>
        </form>
    </div>

    <script>
        var currentUrl = window.location.href;
        var pageLinks = document.querySelectorAll('.pageLinks');
        pageLinks.forEach(function(link) {
            var linkUrl = link.querySelector('a').href;
            if (currentUrl.includes(linkUrl)) {
                link.classList.add('active');
            }
        });
    </script>
</body>

</html>

    <style>
        /* Global Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .main {
            display: flex;
        }

        .side-navbar {
            background-color: #333;
            color: white;
            width: 250px;
            height: 100vh;
            position: fixed;
            padding-top: 100px;
        }

        .side-navbar p {
            margin: 0;
            padding-left: 15px;
            font-weight: bold;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .side-navbar ul {
            list-style-type: none;
            padding: 0;
        }

        .side-navbar ul li {
            padding: 10px;
        }

        .side-navbar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
        }

        .side-navbar ul li a:hover {
            background-color: #555;
        }

        .active a {
            background-color: #4CAF50;
        }

        .logout-btn1 {
            background-color: #f44336;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;

        }

        .logout-container {
            position: fixed;
            bottom: 20px;
            left: 20px;
        }

        .logout-btn2 {
            background-color: #f44336;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>