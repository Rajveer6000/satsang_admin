<?php
include './Dbconnection/dbconnect.php';
include './Dbconnection/dbh.php';


$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);

include './navbaradmin.php';
?>

<html>

<head>
  <link rel="stylesheet" type="text/css">
</head>

<body>
  <div style="margin-left: 200px; ">

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