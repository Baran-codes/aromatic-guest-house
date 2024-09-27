<?php
  include('connection.php');
    $r_number = "";
    $r_type = "";
    $status = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD']=='POST') {
      $r_number = $_POST["r_number"];
      $r_type = $_POST["r_type"];
      $r_status = $_POST["status"];

      do{
        if (empty($r_number) || empty($r_type) || empty($r_type)) {
          $errorMessage = "All the field are required";
          break;
        }
        $sql = "INSERT INTO rooms (r_number, r_type, status) VALUES ('$r_number', '$r_type', '$status')";
        $result = $conn->query($sql);

        if (!$result) {
          $errorMessage = "Invalid query: " . $conn->error;
          break;
        }
          $r_number = "";
          $r_type = "";
          $status = "";
          $successMessage = "Room added successully";
          header("location: room.php");
          exit;
        
      } while (false);
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<title>Aromatic guesthouse</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
  input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  
  input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  input[type=submit]:hover {
    background-color: #45a049;
  }
  
  div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }
  </style>
</head>
<body>

  <div class="sidenav">
    <p class="side"><a href="index.php">HOME</a></p>
    <p class="side"><a href="room.php">Available rooms</a></p>
    <p class="side"><a href="booked.php">Booked room</a></p>
    <p class="side"><a href="staff.php">Manage staff</a></p>
    <p class="side"><a href="report.php">Reports</a></p>
    <p class="side"><a href="#">Website</a></p>
  </div>
<div class="main">
  <h1>Add new room</h1>
  <?php
  if (!empty($errorMessage)) {
    echo"
  <div class='alert alert-danger' role='alert'>
    <strong>$errorMessage</strong>
    <button type='button' class='btn-close'data-bs-dismiss='alert' arial-labal='close'></button>
  </div>
  ";
}
  ?>
  <div>
    <form method="POST">
      <label for="number">Room Number:</label><br>
      <input type="text" id="number" name="r_number" value="<?php echo $r_number; ?>"><br>
      <label for="type">Room Type:</label><br>
      <input type="text" id="type" name="r_type" value="<?php echo $r_type; ?>"><br>
      <label for="status">Status:</label><br>
      <select name="status" id="status" value="<?php echo $r_number; ?>">
        <option value="available" >Available</option>
        <option value="booked">Booked</option>
      </select><br><br>

      <?php
        if(!empty($successMessage)){
          echo"
          <div class='alert alert-success' role='alert'>
            <strong>$successMessage</strong>
              <button type='button' class='btn-close'data-bs-dismiss='alert' arial-labal='close'></button>
          </div>
          ";
        }
      ?>

      <input type="submit" name="submit" class="btn btn-success">
      <a href="room.php" class="btn btn-danger" style="margin-left: 200px;">Cancel</a>
    </form>
  </div>
  </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html> 