<?php
    $servername='localhost';
    $username='root';
    $password='';
$dbname = 'sdb';
    $con=mysqli_connect($servername,$username,$password,$dbname);
    if(!$con){
        die('Could not Connect to MySql'.mysql_error());
    }
    return $con;
?>