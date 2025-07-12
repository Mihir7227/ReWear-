
<?php
include "db.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - ReWear</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-5">
  <h2>Your Dashboard</h2>
  <a href="add-item.html">+ Add New Item</a>
  <div class="row">
    <?php
    $res = mysqli_query($conn, "SELECT * FROM items ORDER BY id DESC");
    while($row = mysqli_fetch_assoc($res)) {
      echo "<div class='card' style='width: 18rem; margin: 10px;'>
              <img src='{$row['image_path']}' class='card-img-top'>
              <div class='card-body'>
                <h5 class='card-title'>{$row['title']}</h5>
                <p class='card-text'>{$row['description']}</p>
                <p>Size: {$row['size']} | Condition: {$row['item_condition']}</p>
              </div>
            </div>";
    }
    ?>
  </div>
</div>
</body>
</html>
