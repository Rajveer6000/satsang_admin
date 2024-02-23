<?php
include './Dbconnection/dbconnect.php';
include './Dbconnection/dbh.php';

// Check if the user is logged in
session_start();
if (!isset($_SESSION['user_name'])) {
  header("Location: index.php");
  exit;
}

// Logout functionality
if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: index.php");
  exit;
}

$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);

include './navbaradmin.php';
?>

<html>

<head>
  <style>
    /* Table styles */
    
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
</head>

<body>
  <div style="margin-left: 250px; ">
    <div class="table-wrapper">
     <center><h1 style="margin-left: 200px;">ALL posts</h1></center>

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
            echo "<td>" . $row['moderated'] . "</td>";
            echo "<td><button class='view-btn' onclick='viewPost(" . $row['post_id'] . ")'>View</button></td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Logout form -->
  <form id="logoutForm" method="post">
    <button type="submit" name="logout" class="logout-btn">Logout</button>
  </form>

  <!-- JavaScript function to view post details -->
  <script>
    function viewPost(postId) {
      window.location.href = 'view_post.php?id=' + postId;
    }

    // Logout function
    document.getElementById('logoutForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent the form from submitting normally
      if (confirm('Are you sure you want to logout?')) {
        this.submit(); // If the user confirms, submit the form
      }
    });
  </script>
</body>

</html>