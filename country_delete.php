<?php
require 'configure.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];

    // Sanitize the input
    $name = mysqli_real_escape_string($conn, $name);

    // Perform the delete query
    $sql = "DELETE FROM country WHERE name = '$name'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
