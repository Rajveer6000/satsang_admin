<?php
include './Dbconnection/dbconnect.php';

if (isset($_GET['postId']) && isset($_GET['newStatus'])) {
    $postId = $_GET['postId'];
    $newStatus = $_GET['newStatus'];

    // Validate and sanitize input if necessary

    // Update the 'moderated' status in the database
    $updateSql = "UPDATE posts SET moderated = '$newStatus' WHERE post_id = '$postId'";
    $updateResult = mysqli_query($conn, $updateSql);

    // Handle the result or send a response back if needed
    // You may send a JSON response, for example: echo json_encode(['success' => true]);
}
?>

