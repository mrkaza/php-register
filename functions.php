<?php 

    session_start();

    //connect to db
    $db = mysqli_connect('localhost','root','','vue-reg');

    //declare variables

    $username = '';
    $errors = array();

    //call registration if button is pressed
    if(isset($_POST['reg-submit'])) {
        register();
    }

    //REGISTRATION 
    function register() {
        //make var available in function
        global $db, $errors, $username;

        //get values from form
        $username = $_POST['username'];
        $password_1 = $_POST['password'];
        $password_2= $_POST['password-repeat'];

        //check if the form is filled
        if(empty($username)) {
            array_push($errors,"Username is required");
        }
        if(empty($password_1)) {
            array_push($errors,"Password is required");
        }
        if($password_1 != $password_2) {
            array_push($errors,"Passwords do not match");
        }

        //register user 
        if (count($errors) == 0) {
            $password = md5($password_1); // encrypt the password

            if(isset($_POST['user_type'])) {
                $user_type = e($_POST['user_type']);
                $query = "INSERT INTO users (username,password,user_type)
                          VALUE('$username', '$password','$user_type')";
                $mysqli_query($db,$query);
                $_SESSION['success'] = "New user created successfully";
                header('location: home.php');
            }
            else {
                $query = "INSERT INTO users (username,password,user_type)
                          VALUE('$username','$password','user')";
                mysqli_query($db,$query);

                //get id from created user
                $logged_in_id = mysqli_insert_id($db);

                $_SESSION['user'] = getUserById($logged_in_id);
                $_SESSION['success'] = "You are now logged in";
                header('location: home.php');
            }
        }
    }

    //get user from id
    function getUserById($id) {
        global $db;
        $query = "SELECT * FROM users WHERE id=" . $id;
        $result = mysqli_query($db,$query);

        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    //display error message
    function display_error() {
        global $errors;

        if(count($errors) >0) {
            echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		    echo '</div>';
        }
    }

    //check if user is logged in
    function isLoggedIn() {
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }


    //LOGIN 
    //log if login button pressed
    if(isset($_POST['log-submit'])) {
        login();
    }

    function login() {
        global $db, $username, $errors;
        //get form values
        $username = $_POST['usernameLogin'];
        $password = $_POST['passwordLogin'];

        //form filled properly
        if(empty($username)) {
            array_push($errors,"Username is required");
        }
        if(empty($password)) {
            array_push($errors, "Password is required");
        }

        //login if no errors
        if(count($errors)== 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
            $results = mysqli_query($db, $query);

            if(mysqli_num_rows($results)==1) {
                //user found
                //check if user is admin
                $logged_in_user = mysqli_fetch_assoc($results);
                // if ($logged_in_user['user_type'] == 'admin') {
                //     $_SESSION['user'] = $logged_in_user;
                //     $_SESSION['success'] = "You are now logged in"
                // }
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']= "You are now logged in";
                header('location: home.php');
            } else {
                array_push($errors, "Wrong username/password combination");
            }
        }
    }


    //check if user is admin
    function isAdmin() {
        if (isset($_SESSION['user']) && $_SESSION['user']['user_type']== 'admin') {
            return true;
        } else {
            return false;
        }
    }

?>