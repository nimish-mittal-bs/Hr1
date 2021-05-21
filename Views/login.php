<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: toggle1.php");
        exit;
}
include('database.php');

if (isset($_POST['submit'])) {

    // Data sanitization to prevent SQL injection
    $usernam = $_POST["uname"];
    $passwor = $_POST["psw"];
    // Error message if the input field is left blank
    if (empty($usernam)) {
        array_push($errors, "Username is required");
    }
    if (empty($passwor)) {
        array_push($errors, "Password is required");
    }

    // Checking for the errors
    if (count($errors) == 0) {
        // Password matching
        $passworee = md5($passwor);
        $query ="SELECT E_id, Password,M_id FROM users_data WHERE E_id='$usernam' AND Password='$passworee'";

        $results = mysqli_query($conn, $query);
        echo "Returned rows are: " . $results -> num_rows;

        // $results = 1 means that one user with the
        // entered username exists
        if (mysqli_num_rows($results) == 1) {

            // Storing username in session variable
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['id'] = $usernam;
            $_SESSION['Ment']=$row['M_id'];
            $_SESSION['last_activity']=time();

            // Welcome message
            $_SESSION['success'] = "You have logged in!";

            // Page on which the user is sent
            // to after logging in
            //header('location: signup.php');
            echo "<script> location.href='toggle1.php'; </script>";
                exit;
        }
        else {
            echo "Hi";
            // If the username and password doesn't match
            array_push($errors, "Username or password incorrect");
        }
    }
}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Login Page</title>
    <link rel="stylesheet" href="../assests/css/login.css">

</head>

<body>


    <div class="container">
        <div class="square">
            <div class="content">
                <form  method="post">

                    <div class="imgcontainer">
                        <img src="../assests/images/Web 1920 – 2.png" alt="Avatar" class="avatar">
                    </div>

                    <input type="number" placeholder="Enter Username" name="uname" required>


                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit" name="submit">Login</button>
                     <span><a href="#">Forget?</a></span>
                </form>
                <br><br>
                <p style="text-align:center;">All Right Reserved</p>
            </div>
        </div>
    </div>
</body>

</html>