<?php 
    include "config.php";
    
    $userName = $_POST["username"];
    $password = $_POST["password"];


    $sql = "SELECT * FROM users WHERE Username = '$userName' AND Password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
    
    if($count == 1){  
        session_start();
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["user-name"] = $row["Username"];
        $_SESSION["mail"] = $row["Email"];

        
        header("Location: ../cart.php"); // Redirect to user dashboard 
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>"; 

    }     

    $con->close();


?>