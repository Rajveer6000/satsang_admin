<?php
session_start();
include './Dbconnection/dbconnect.php';
include './Dbconnection/dbh.php';

$email = $_POST['user_name'];
$password = $_POST['password'];

// Prepare the SQL statement
$stmt = $conn->prepare("SELECT * FROM `adminlogin` WHERE user_name = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

if($result->num_rows == 1){
    $_SESSION["logged_in"] = true;
    echo ("logged in");
    header("Location: posts.php");
} else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
?>