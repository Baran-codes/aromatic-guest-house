<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

  <div class="sidenav">
    <p class="side"><a href="index.php">HOME</a></p>
    <p class="side"><a href="room.php">Available rooms</a></p>
    <p class="side"><a href="booked.php">Booked room</a></p>
    <p class="side"><a href="staff.php">Manage staff</a></p>
    <p class="side"><a href="report.php">Reports</a></p>
    <p class="side"><a href="../index.html">Website</a></p>
  </div>

<div class="main">
  <h1>GUEST CHECKED IN</h1>
  <a class="btn btn-success" style="margin-bottom: 5px" href="create.php">New check in</a>

<table class="table">
  <thead class="table-dark">
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Check in</th>
    <th>Check out</th>
    <th>Room Type</th>
    <th>Action</th>
  </thead>
  <tbody>
    <?php
      include("connection.php");

      $sql = "SELECT * FROM bookings";
      $result = $conn->query($sql);

      if (!$result) {
        die("invalid query: " .$conn->error);
      }

      while($row = $result->fetch_assoc()) {
        echo"<tr>
         <td>" . $row["id"] . "</td>
         <td>" . $row["name"] . "</td>
         <td>" . $row["email"] . "</td>
         <td>" . $row["mobile"] . "</td>
         <td>" . $row["check_in"] . "</td>
         <td>" . $row["check_out"] . "</td>
         <td>" . $row["room"] . "</td>
         <td>
            <a href='update.php?id=$row[id]' class='btn btn-primary'>Edit</a>
            <a href='delete.php?id=$row[id]' class='btn btn-danger'>Delete</a>
         <tr>";
      }
    ?>
  </tbody>
</table>
</div>
   
</body>
</html> 
