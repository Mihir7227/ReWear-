
<?php
include "db.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel - ReWear</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-5">
  <h2>Admin Panel - Manage Listings</h2>
  <table border="1" cellpadding="10" cellspacing="0" width="100%">
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Category</th>
      <th>Size</th>
      <th>Condition</th>
      <th>Action</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM items");
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['title']}</td>
                <td>{$row['category']}</td>
                <td>{$row['size']}</td>
                <td>{$row['item_condition']}</td>
                <td>
                    <a href="delete.php?id={$row['id']}" onclick=" confirm('Delete this item?')">Delete</a>
                </td>
              </tr>"
    }
    ?>
  </table>
</div>
</body>
</html>
