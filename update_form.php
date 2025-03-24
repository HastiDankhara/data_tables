<?php
  require 'configure.php';

  if (isset($_POST['name']) && isset($_POST['status']) && isset($_POST['cd'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $cd = mysqli_real_escape_string($conn, $_POST['cd']);

    // Update query
    $sql = "UPDATE country SET status='$status', create_date='$cd' WHERE name='$name'";

    if (mysqli_query($conn, $sql)) {
      echo "Update successful";
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  } else {
    echo "Missing data!";
  }

  mysqli_close($conn);
?>
