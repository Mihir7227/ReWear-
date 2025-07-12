
<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $category = $_POST['category'];
    $size = $_POST['size'];
    $condition = $_POST['condition'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $folder = "uploads/" . $image;

    if (move_uploaded_file($tmp, $folder)) {
        $query = "INSERT INTO items (title, description, category, size, item_condition, image_path)
                  VALUES ('$title', '$desc', '$category', '$size', '$condition', '$folder')";
        if (mysqli_query($conn, $query)) {
            echo "Item uploaded successfully! <a href='dashboard.php'>Go to Dashboard</a>";
        } else {
            echo "DB Error: " . mysqli_error($conn);
        }
    } else {
        echo "Image upload failed!";
    }
}
?>
