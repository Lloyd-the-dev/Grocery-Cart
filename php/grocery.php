<?php
include "config.php";


session_start();
$username = $_SESSION["user-name"];

$sql = "SELECT `grocery_id`, `grocery_item`, `Username` FROM grocery_items WHERE Username = '$username'"; 
$result = $con->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>