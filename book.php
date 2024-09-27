
<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aromatic";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $check_in = $_POST["in"];
        $check_out = $_POST["out"];
        $room = $_POST["room"];

        $stmt = $conn->prepare("INSERT INTO bookings (name, email, mobile, check_in, check_out, room) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $email, $mobile, $check_in, $check_out, $room);

        if ($stmt->execute()) {
            echo "New booking created successfully";
        }
        else{
            echo "Error: " . $stmt->error;
        }
         
        $stmt->close();
        $conn->close();
    }
    ?>