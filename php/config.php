<?php
$servername = "localhost";
$username = "root"; 
$password = "oreoluwa2003"; 
$dbname = "grocery"; 

// Create a database connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
