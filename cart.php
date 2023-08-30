<?php
     session_start();
     if (!isset($_SESSION["user_id"])) {
         header("Location: index.html");
         exit();
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Cart | 2023</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon-16x16.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="manifest" href="/site.webmanifest">
</head>
<body>
    <div class="nav-ish">
        <h1 class="main-heading"><?php echo $_SESSION["user-name"]?>'s Grocery Checklist</h1>
        <a href="./php/logout.php">Logout</a>
    </div>
   
    <div class="container">
        <img src="./images/groceries.png" alt="" class="img">
        <form action="cart.php" method="post">
            <input type="text" id="inp-el" placeholder="Grocery....." class="input-field" name="item">
            <button id="btn" class="btn" name="submit" type="submit">Add to cart</button>
        </form>
        
        <ul class="items" id="shopping-list">

        </ul>
    </div>

    <script src="index.js"></script>
</body>
</html>
<?php 
    include "./php/config.php";
    if(!empty($_POST["item"])){
        $item = $_POST["item"];
        $username = $_SESSION["user-name"];

        $sql = "INSERT INTO `grocery_items` (`grocery_id`, `grocery_item`, `Username`) VALUES ('0', '$item', '$username')";

        $rs = mysqli_query($con, $sql);

        if($rs)
        {
            echo '<script type ="text/JavaScript">'; 
            echo 'alert("Item successfully added!")';
            echo '</script>';  
        }

        mysqli_close($con);
    }
?>