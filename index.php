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
    <div class="container">
        <h2>ADMIN LOGIN</h2>
        <form action="./aprocess.php" name="adminlogin" method="post">
            <label for="user_name">User Name</label>
            <input type="text" name="user_name" placeholder="Enter your username" autocomplete="off" required>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter your password" autocomplete="off" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #34495e;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
        }

        .container h2 {
            margin: 0 0 20px;
            text-align: center;
            color: #2c3e50;
        }

        .message {
            color: red;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #2c3e50;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #3498db;
        }

        button[type="submit"] {
            width: 100%;
            padding: 20px;
            background-color: #2ecc71;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #27ae60;
        }
    </style>