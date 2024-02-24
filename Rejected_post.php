<?php
// require_once('dbh.php');
include './Dbconnection/dbh.php';
include './navbaradmin.php';
function updateModeratedStatus($postId, $status) {
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
}


if (isset($_POST['approve_button'])) {
    $postId = $_POST['post_id'];
    updateModeratedStatus($postId, 1); 
}

$sql = "SELECT * FROM posts WHERE moderated = 2";

$result = mysqli_query($conn, $sql);
include './navbaradmin.php';
?>

<html>

<head>
    <link rel="stylesheet" type="text/css">
</head>

<body>
    <div style="margin-left: 250px; ">
        <div class="table-wrapper">
            <center>
                <h1 style="margin-left: 200px;">Rejected posts</h1>
            </center>
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>Post ID</th>
                        <th>Post Title</th>
                        <th>Post Text</th>
                        <th>Category</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>State</th>
                        <th>District</th>
                        <th>Country</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['post_id'] . "</td>";
                        echo "<td>" . $row['post_title'] . "</td>";
                        echo "<td>" . $row['post_txt'] . "</td>";
                        echo "<td>" . $row['category'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['city'] . "</td>";
                        echo "<td>" . $row['state'] . "</td>";
                        echo "<td>" . $row['district'] . "</td>";
                        echo "<td>" . $row['country'] . "</td>";
                        echo "<td>" . $row['moderated'] . "</td>";
                        echo "<td>";
                        echo "<a><button onclick='viewPost(" . $row['post_id'] . ")' class='view-btn'>View</button></a>";
                        echo "<form method='post' style='display:inline;'><input type='hidden' name='post_id' value='" . $row['post_id'] . "'><button type='submit' name='approve_button' class='acceptbtn'>Approve</button></form>";
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
    .view-btn {
        width: 70px;
        color: white;
        background-color: #0000FF;
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 5px;

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
        margin-top: 5px;
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
        margin-top: 5px;
    }
    .acceptbtn:hover {
        background-color: #45a049;
    }

    .fl-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .fl-table th {
        background-color: #FFA500;
        color: white;
    }

    .fl-table th,
    .fl-table td {
        text-align: left;
        padding: 8px;
        border: 1px solid #ddd;
    }

    .fl-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .fl-table tbody tr:hover {
        background-color: #ffc107;
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
    function viewPost(post_Id) {
        console.log(post_Id);
    }
</script>