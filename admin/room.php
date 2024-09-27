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
        <p class="side"><a href="report.html">Reports</a>
      </div>

<div class="main">
  <h1>Available Rooms</h1>
  <a class="btn btn-success" style="margin-bottom: 5px" href="create.php">Add room</a>

<table class="table">
  <thead class="table-dark">
    <th>Id</th>
    <th>Room Number</th>
    <th>Room Type</th>
    <th>Room Status</th>
    <th>Action</th>
  </thead>
  <tbody>
    <?php
      include("connection.php");

      $sql = "SELECT * FROM rooms";
      $result = $conn->query($sql);

      if (!$result) {
        die("invalid query: " .$conn->error);
      }

      while($row = $result->fetch_assoc()) {
        echo"<tr>
         <td>" . $row["id"] . "</td>
         <td>" . $row["r_number"] . "</td>
         <td>" . $row["r_type"] . "</td>
         <td>" . $row["status"] . "</td>
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
