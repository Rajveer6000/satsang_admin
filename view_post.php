<?php
include './Dbconnection/dbconnect.php';
include './Dbconnection/dbh.php';
include './navbaradmin.php';

$postId = isset($_GET['id']) ? trim(mysqli_real_escape_string($conn, $_GET['id'])) : '';

$sql = "SELECT * FROM posts WHERE post_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $postId);
mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);
$postDetails = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);


$statuses = array(
    0 => 'Post Pending',
    1 => 'Post Approved',
    2 => 'Post Rejected'
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
    </style>
</head>
<body>

<header>
    <h1>Post Details</h1>
</header>

<div class="container">
    <?php
    // Display post details
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
        echo "<td class='$statusClass' data-status='" . strtolower($status) . "'>" . $status . "</td>";
    } else {
        echo "<p>Post not found.</p>";
    }
    ?>
</div>

<!-- Include your footer here if needed -->

</body>
</html>