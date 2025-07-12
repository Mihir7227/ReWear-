
<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm'];

    if ($password !== $confirm) {
        echo "Passwords do not match!";
        exit;
    }

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "Email already registered!";
        exit;
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed')";

    if (mysqli_query($conn, $query)) {
        echo "Signup successful! <a href='login.html'>Login Now</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
