<?php
include "config.php"; // Include the database connection file

if (isset($_GET["id"])) {
    $rowId = $_GET["id"];

    // Delete the row from the project_details table
    $deleteQuery = "DELETE FROM grocery_items WHERE grocery_id = '$rowId'";
    
    if ($con->query($deleteQuery) === TRUE) {
        header("Location: ../cart.php");
        exit();
    } else {
        echo "Error deleting row: " . $con->error;
    }

    $con->close();
}
?>
