<?php
session_start();
include './Dbconnection/dbconnect.php';
include './Dbconnection/dbh.php';

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    // Redirect to login page
    header("location: index.php");
    exit;
}
function updateModeratedStatus($postId, $status)
{
    global $conn;
    $sql = "UPDATE posts SET moderated = ? WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $status, $postId);
    $stmt->execute();
    $stmt->close();
}

// Check if the reject button is clicked
if (isset($_POST['reject_button'])) {
    $postId = $_POST['post_id'];
    updateModeratedStatus($postId, 2); // Set moderated status to 2 for rejected
}

// Check if the approve button is clicked
if (isset($_POST['approve_button'])) {
    $postId = $_POST['post_id'];
    updateModeratedStatus($postId, 1); // Set moderated status to 1 for approved
}

// Prepare the SQL query to select posts with moderated status 1
$sql = "SELECT * FROM posts WHERE moderated = 1";
// Execute the SQL query
$result = mysqli_query($conn, $sql);
include './navbaradmin.php';
?>

<html>

<head>
    <link rel="stylesheet" type="text/css">
</head>

<body>
<div class="container">
        <div class="header">
            <h1>Approved Posts</h1>
        </div>
        <div class="table-wrapper">

            <table class="fl-table">
                <thead>
                    <tr>
                        <th>Post ID</th>
                        <th>Post Title</th>
                        <th>Post Text</th>
                        <th>Category</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td class='post-id'>" . $row['post_id'] . "</td>";
                        echo "<td>" . $row['post_title'] . "</td>";
                        echo "<td class='post-text'>" . $row['post_txt'] . "</td>";
                        echo "<td>" . $row['category'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['city'] . ", " . $row['district'] . ", " . $row['state'] . ", " . $row['country'] . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                       

                        echo "<td class='action'>";
                        echo "<a href='view_post.php?id=" . $row['post_id'] . "'><button class='view-btn'>View</button></a>";
                        echo "<form method='post' style='display:inline;'><input type='hidden' name='post_id' value='" . $row['post_id'] . "'><button type='submit' name='reject_button' class='rejectbtn'>Reject</button></form>";
                        echo "</td>";


                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

<style>

.container{
        margin-right:50px;
        margin-left:300px;
    }

    .view-btn {
        width: 70px;
        color: white;
        background-color: #0000FF;
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin: 5px;

    }

    .view-btn:hover {
        background-color: #0000CD;
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

    .header {
        padding: 10px;
        text-align: center;
    }

    .fl-table td.post-text {
        max-width: 250px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
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

    .fl-table {
        width: 100%;
        border-collapse: collapse;
    }
   
    .fl-table th {
    background-color: #FFA500;
    color: white;
    text-align: center; 
    padding: 8px;
    border: 1px solid #ddd;
}

    .fl-table td {
        text-align: left;
        padding: 8px;
        border: 1px solid #ddd;
    }

    .fl-table td.action {
        text-align: center;
        padding: 8px;
        border: 1px solid #ddd;
    }

    .fl-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .fl-table tbody tr:hover {
        background-color:#abaaa6;
    }



    /* Logout button styles */
    .logout-btn {
        background-color: #f44336;
        color: white;
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 20px;
    }

    .logout-btn:hover {
        background-color: #d32f2f;
    }
</style>

<script>
    function viewPost(postId) {
        window.location.href = 'view_post.php?id=' + postId;
    }
</script>