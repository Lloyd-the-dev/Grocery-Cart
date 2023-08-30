<?php 
    include "config.php";

    if(isset($_POST['submit']))
    {
        $userName = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confPassword = $_POST["copassword"];

    }
    if($password != $confPassword){
      echo '<script type ="text/JavaScript">'; 
      echo 'alert("Passwords do not match")';
      echo '</script>';
    }else{
     
      $sql = "INSERT INTO `users` (`user_id`, `Username`, `Email`, `Password`) VALUES ('0', '$userName', '$email', '$password')";

      $rs = mysqli_query($con, $sql);

      if($rs)
      {
        header("Location: ../index.html");
      }

      mysqli_close($con);
    }

?>