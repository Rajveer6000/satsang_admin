<?php
// require_once('dbh.php');
include './Dbconnection/dbh.php';
include './navbaradmin.php';
// Check if accept button is clicked
if (isset($_GET['accept']) && $_GET['accept'] == 'true') {
    $postId = $_GET['postId'];
    // Prepare the SQL query to update moderated status
    $acceptSql = "UPDATE posts SET moderated = 0 WHERE post_id = '$postId'";
    // Execute the SQL query
    mysqli_query($conn, $acceptSql);
}

// Check if the delete button is clicked
if (isset($_GET['delete']) && $_GET['delete'] == 'true') {
    $postId = $_GET['postId'];
    // Prepare the SQL query to delete the post
    $deleteSql = "DELETE FROM posts WHERE post_id = '$postId'";
    // Execute the SQL query
    mysqli_query($conn, $deleteSql);
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
    <div style="margin-left: 200px;">
        <h2>Responsive Table</h2>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>Post ID</th>
                        <!-- <th>Post Title</th>
                        <th>Post Text</th> -->
                        <th>Category</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>State</th>
                        <th>District</th>
                        <th>Country</th>
                        <th>Created At</th>
                        <th>Moderated</th>

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['post_id'] . "</td>";
                        // echo "<td>" . $row['post_title'] . "</td>";
                        // echo "<td>" . $row['post_txt'] . "</td>";
                        echo "<td>" . $row['category'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['city'] . "</td>";
                        echo "<td>" . $row['state'] . "</td>";
                        echo "<td>" . $row['district'] . "</td>";
                        echo "<td>" . $row['country'] . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                        echo "<td>" . $row['moderated'] . "</td>";
                        echo "<td>";
                        echo "<a href='posts.php?accept=true&postId=" . $row['post_id'] . "'>Accept</a> | ";
                        echo "<a href='posts.php?delete=true&postId=" . $row['post_id'] . "'>Delete</a>";
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
    td,
    th {
        border: 1px solid #999;
        padding: 20px;
    }

    td {
        background: gray;
        color: white;
    }

    .primary {
        background-color: brown;
        position: sticky;
    }

    th {
        background: #ffc107;
        color: white;
        border-radius: 0;
        top: 0;
        padding: 10px;
    }

    tbody>tr:hover {
        background-color: #ffc107;
    }
</style>