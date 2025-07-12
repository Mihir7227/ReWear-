
<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM items WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        header("Location: admin.php");
    } else {
        echo "Error deleting item: " . mysqli_error($conn);
    }
}
?>
