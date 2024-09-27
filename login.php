<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "aromatic";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $conn->real_escape_string($_POST["password"]);

    $sql = "SELECT * FROM staffs WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Valid login, redirect to admin page
        header("Location: admin/index.php");
        exit();
    } else {
        // Invalid login, display error message
        echo "Invalid email or password";
    }
}

$conn->close();
?>

