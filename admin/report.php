<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="sidenav">
  <p class="side"><a href="index.php">HOME</a></p>
  <p class="side"><a href="room.php">Available rooms</a></p>
  <p class="side"><a href="booked.php">Booked room</a></p>
  <p class="side"><a href="staff.php">Manage staff</a></p>
  <p class="side"><a href="report.php">Reports</a></p>
</div>

<div class="main">
    
</div>
<div align="center"></div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "aromatic";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to count the number of distinct users who have booked
$sql = "SELECT COUNT(DISTINCT id) AS total_users FROM bookings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the number of users
    while($row = $result->fetch_assoc()) {
        echo "Number of users who have booked: " . $row["total_users"];
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>

</body>
</html> 
