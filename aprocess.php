<?php
include './Dbconnection/dbconnect.php';
include './Dbconnection/dbh.php';


$email = $_POST['user_name'];
$password = $_POST['password'];

$sql = "SELECT * from `adminlogin` WHERE user_name = '$email' AND password = '$password'";

//echo "$sql";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
	

	//echo ("logged in");
    header("Location: posts.php");
}

else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
?>