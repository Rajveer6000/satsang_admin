<?php
include './Dbconnection/dbconnect.php';
include './Dbconnection/dbh.php';

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

    <div style="margin-left: 250px; ">
        <div class="header">
            <h1>ALL posts</h1>
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
                        <th>City</th>
                        <th>State</th>
                        <th>District</th>
                        <th>Country</th>
                        <th>Created At</th>
                        <th>Moderated</th>
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
                        echo "<td>" . $row['created_at'] . "</td>";

                        // Associative array mapping 'moderated' values to statuses
                        $status = $statuses[$row['moderated']];
                        $statusClass = 'status-' . strtolower($status);

                        // Display the corresponding status with class
                        echo "<td class='$statusClass' data-status='" . strtolower($status) . "'>" . $status . "</td>";

                        // echo "<td><button class='view-btn' onclick='viewPost(" . $row['post_id'] . ")'>View</button></td>";
                        // echo "<td><a href='view_post.php?id=" . $row['post_id'] . "' class='view-btn'>View</a></td>";
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
    .fl-table {
        width: 100%;
        border-collapse: collapse;
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
        background-color: #abaaa6;
    }

    .header {
        background-color: #333;
        color: #fff;
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