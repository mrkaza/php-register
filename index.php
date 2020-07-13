<?php 
    include('functions.php');
    if(isLoggedIn()) {
        $_SESSION['msg'] = "You are already logged in";
        header('location: home.php');
    }   

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP-login</title>
</head>
<body>
<div id="app">
    <div class="container">
        <div class="log-reg">
            <h2 @click="showLogin" :class="{active:login}">Login</h2>
            <h2 @click="showRegistration" :class="{active:registration}">Register</h2>
        </div>
        <div v-if="login" class="log-form forma">
            <form action="index.php" method="post">
                <input type="text" name="usernameLogin" placeholder="username">
                <br>
                <input type="password" name="passwordLogin" placeholder="password">
                <br>
                <button type="submit" name="log-submit">Log in</button>
                <?php echo display_error(); ?>
            </form>
            
        </div>
        <div v-if="registration" class="reg-form forma">
            <form action="index.php" method="post">
                <input type="text" name="username" placeholder="username">
                <br>
                <input type="password" name="password" placeholder="password">
                <br>
                <input type="password" name="password-repeat" placeholder="repeat password">
                <br>
                <button type="submit" name="reg-submit">Sign up</button>
                <?php echo display_error(); ?>
            </form>
            
        </div>
    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="vue.js"></script>
</body>
</html>