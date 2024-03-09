<?php
session_start();
include './Dbconnection/dbconnect.php';
include './Dbconnection/dbh.php';

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    // Redirect to login page
    header("location: index.php");
    exit;
}
$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);

include './navbaradmin.php';

$statuses = array(
    0 => 'Pending',
    1 => 'Approved',
    2 => 'Rejected'
);
?>

<html>

<head>
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>All Posts</h1>
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
                        <th>Moderated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td class='id'>" . $row['post_id'] . "</td>";
                        echo "<td>" . $row['post_title'] . "</td>";
                        echo "<td class='post-text'>" . $row['post_txt'] . "</td>";
                        echo "<td>" . $row['category'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['city'] . ", " . $row['district'] . ", " . $row['state'] . ", " . $row['country'] . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";

                        $status = $statuses[$row['moderated']];
                        $statusClass = 'status-' . strtolower($status);

                        echo "<td class='$statusClass' data-status='" . strtolower($status) . "'>" . $status . "</td>";
                        echo "<td><a href='view_post.php?id=" . $row['post_id'] . "'><button class='view-btn'>View</button></a></td>";


                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>



    <!-- JavaScript function to view post details -->
    <script>
        function viewPost(postId) {
            window.location.href = 'view_post.php?id=' + postId;
        }

        // Set text color based on status
        window.addEventListener('DOMContentLoaded', (event) => {
            var statusCells = document.querySelectorAll('.status-td');

            statusCells.forEach(function(cell) {
                var status = cell.getAttribute('data-status').toLowerCase();
                var colors = {
                    'pending': 'yellow',
                    'accepted': 'green',
                    'rejected': 'red'
                };

                // Set text color based on status
                cell.style.color = colors[status] || ''; // Default to empty string if status is not found
            });
        });
    </script>

</body>

</html>
<style>
    /* Table styles */

    .container{
        margin-right:50px;
        margin-left:300px;
    }

    .fl-table td.post-text {
        max-width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .fl-table th.id {
        max-width: 300px;
 
    }

    .fl-table tbody tr:hover {
        background-color: #abaaa6;
    }

    .fl-table tbody tr td.post-text {
        max-width: 200px; 
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
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

    .fl-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .fl-table tbody tr:hover {
        background-color: #abaaa6;
    }

    .header {
        color: #000;
        padding: 10px;
        text-align: center;
    }

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