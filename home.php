<?php
    include('functions.php');
    if(!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">

    <title>PHP-login</title>
</head>
<body>
<div class="home">

    <div class="text-container">
    <?php
        if(isAdmin()) { 
    ?>

        <div class="text">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ut quidem, culpa iure nulla dolorem sapiente officia minus sunt rem?</p>
        </div>
        <div class="text">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ut quidem, culpa iure nulla dolorem sapiente officia minus sunt rem?</p>
        </div>
        <div class="text">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ut quidem, culpa iure nulla dolorem sapiente officia minus sunt rem?</p>
        </div>

    <?php
        }
        else {
    ?>    
        <div class="text">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ut quidem, culpa iure nulla dolorem sapiente officia minus sunt rem?</p>
        </div>
    <?php         
        }
    ?>  
        <a class="logout" href="logout.php">Logout</a>

    </div>
</div>
    

</body>
</html>