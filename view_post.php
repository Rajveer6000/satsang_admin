<?php
session_start();
include './Dbconnection/dbconnect.php';
include './Dbconnection/dbh.php';
include './navbaradmin.php';
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    // Redirect to login page
    header("location: index.php");
    exit;
}
$postId = isset($_GET['id']) ? trim(mysqli_real_escape_string($conn, $_GET['id'])) : '';

$sql = "SELECT * FROM posts WHERE post_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $postId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$postDetails = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

function updateModeratedStatus($postId, $status)
{
    global $conn;
    $sql = "UPDATE posts SET moderated = ? WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $status, $postId);
    $stmt->execute();
    $stmt->close();
}
if (isset($_POST['reject_button'])) {
    $postId = $_POST['post_id'];
    updateModeratedStatus($postId, 2);
    header("Location: Rejected_post.php");
    exit();
}
if (isset($_POST['approve_button'])) {
    $postId = $_POST['post_id'];
    updateModeratedStatus($postId, 1);
    header("Location: Approved_post.php");
    exit();
}

$statuses = array(
    0 => 'Pending',
    1 => 'Approved',
    2 => 'Rejected'
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            margin: 10px 0;
        }

        strong {
            font-weight: bold;
        }

        .rejectbtn {
            background-color: #f44336;
            width: 70px;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
        }

        .rejectbtn:hover {
            background-color: #d32f2f;
        }

        .acceptbtn {
            background-color: #4CAF50;
            width: 70px;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
        }

        .acceptbtn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <header>
        <h1>Post Details</h1>
    </header>

    <div class="container">
        <?php
        if ($postDetails) {
            echo "<h2>Post Details</h2>";
            echo "<p><strong>Post ID:</strong> " . $postDetails['post_id'] . "</p>";
            echo "<p><strong>Title:</strong> " . $postDetails['post_title'] . "</p>";
            echo "<p><strong>Category:</strong> " . $postDetails['category'] . "</p>";
            echo "<p><strong>City:</strong> " . $postDetails['city'] . "</p>";
            echo "<p><strong>District:</strong> " . $postDetails['district'] . "</p>";
            echo "<p><strong>State:</strong> " . $postDetails['state'] . "</p>";
            echo "<p><strong>Country:</strong> " . $postDetails['country'] . "</p>";
            echo "<p><strong>Post Text:</strong> " . $postDetails['post_txt'] . "</p>";
            echo "<p><strong>Created At:</strong> " . $postDetails['created_at'] . "</p>";
            $status = $statuses[$postDetails['moderated']];
            $statusClass = 'status-' . strtolower($status);
            echo "<br><td class='$statusClass' data-status='" . strtolower($status) . "'>" . "This post has been "."<span style='font-weight:bold;'>".$status."</span>" . "</td><br>";
            if ($postDetails['moderated'] == 2) {
                echo "<form method='post' style='display:inline;'><input type='hidden' name='post_id' value='" . $postDetails['post_id'] . "'><span>Would you like to Approve it?</span>&nbsp<button type='submit' name='approve_button' class='acceptbtn'>Approve</button></form>";
            } elseif ($postDetails['moderated'] == 1) {
                echo "<form method='post' style='display:inline;'><input type='hidden' name='post_id' value='" . $postDetails['post_id'] . "'><span>Would you like to Reject it?</span>&nbsp<button type='submit' name='reject_button' class='rejectbtn'>Reject</button></form>";
            } else {
                echo "<form method='post' style='display:inline;'><input type='hidden' name='post_id' value='" . $postDetails['post_id'] . "'><button type='submit' name='reject_button' class='rejectbtn'>Reject</button></form>";
                echo "<form method='post' style='display:inline;'><input type='hidden' name='post_id' value='" . $postDetails['post_id'] . "'><button type='submit' name='approve_button' class='acceptbtn'>Approve</button></form>";
            }
        } else {
            echo "<p>Post not found.</p>";
        }
        ?>
    </div>
</body>

</html>