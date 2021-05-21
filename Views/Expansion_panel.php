<?php
session_start();
if (!isset($_SESSION["loggedin"]) && !($_SESSION["loggedin"] === true))         {
    header("Location: login.php");
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>HR Portal</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../assests/css/toggle.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
</head>

<body style="background: #f1f1f1;">
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">

            <h3><img src="../assests/images/bigstep.jpeg" style="width:249px;height:100px;" alt="Italian Trulli"></h3>


            <ul class="list-unstyled components">
                <p>SELF- SERVICE</p>
                <li>
                    <a href="toggle1.php" style="color:white;">HOME</a>
                </li>
                <li class="active" style="background: grey;">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle" >Approvel</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="admin_Leave1.php" style="color:white;" style="background: blue;">Leave</a>
                        </li>
                        <li>
                            <a href="admin_attendence1.php" style="color:white;">Attendence</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle" style="color:white;">Request</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="Leave.php" style="color:white;">Leave</a>
                        </li>

                        <li>
                            <a href="AttendenceConnection.php" style="color:white;">Attendence</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="Team.php" style="color:white;">TEAM</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle" style="color:white;">Performance</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                </ul>
            </ul><ul class="list-unstyled components"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <?php
                if(isset($_SESSION['id'])){
                    //echo "Welcome". $_SESSION['id'];
                    $id=$_SESSION['id'];
                    //echo "<br>";
                include('database.php');
                $sql1 = "SELECT Category FROM users_data WHERE E_id='$id' and (Category='Admin' or Category='Super User')";
                $resultsss = $conn->query($sql1);
                //echo"hi";
                //echo "Returned rows are: " . $resultsss -> num_rows;
                $row = $resultsss->fetch_assoc();
                //$cat1=$row["Category"];
                //echo "$cat1";
                if ($resultsss->num_rows > 0){
            ?>
            <li>
            <a href="Expansion_panel.php"> <button type="button" class="btn btn-primary btn-lg">ADD User</button></a>
            </li>
        <?php }};?></ul>
            <!--
$sql1 = "SELECT First_Name, Last_Name,Username,M_id FROM users_data WHERE E_id='$id' and (Category='Admin or Category='Super Admin')";
$resultsss = $conn->query($sql1);
//echo"hi";
echo "Returned rows are: " . $resultsss -> num_rows;
if ($resultsss->num_rows > 0) {
?>





               <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <ul class="list-unstyled components">
                <li>
           <a href="Expansion_panel.php"> <button type="button" class="btn btn-primary btn-lg">ADD User</button></a>

            </li>

</ul>-->
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg py-3 navbar-light bg-primary">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active" style="background: blue;">
                                <a class="nav-link" href="#" style="background: blue;"><div class="user1" style="background-image:url('../assests/images/sound-bell.png')"></div></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="search.php"><div class="user1" style="background-image:url('../assests/images/profile-icon.png')"></div></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../assests/images/help.png"><div class="user1" style="background-image:url('../assests/images/help.png')"></div></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profie.php"><div class="user" style="background-image:url('../assests/images/profile-image1.png')"></div>
</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link" href="logout.php"> <button type="submit"  name="button2">Logout</button></a>
                            </li>


                        </ul>
                    </div>
                </div>
            </nav>



<!-- Signup button-->
<?php
session_start();

//if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
 //       header("location: toggle1.php");
   //     exit;
//}
include('database.php');

if (isset($_POST['submit'])) {

    // Data sanitization to prevent SQL injection
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $ccity = $_POST["ccity"];
    $usernam = $_POST["uname"];
    $sstate = $_POST["sstate"];
    $zzip = $_POST["zzip"];
    $fnname = $_POST["fnname"];
    $mnname = $_POST["mnname"];
    $mtname = $_POST["mtname"];
    $email1 = $_POST["email1"];
    $eid = $_POST["eid"];
    $dob = $_POST["dob"];
    $doj = $_POST["doj"];
    $mid = $_POST["mid"];
    $gen = $_POST["gen"];
    $passwor = md5('1234');
    // Error message if the input field is left blank
    if (empty($usernam)) {
        array_push($errors, "Username is required");
    }
    if (empty($passwor)) {
        array_push($errors, "Password is required");
    }

    $sql = "INSERT INTO users_data (First_Name,Last_Name,Username,Father_Name,Mother_Name,City,State,Zip,Mentor_Name,Email,Password,E_id,M_id,D_O_B,D_O_J,Gender,Role,Photo,Category)
          VALUES ('$fname','$lname','$usernam','$fnname','$mnname','$ccity','$sstate','$zzip','$mtname','$email1','$passwor','$eid','$mid','$dob','$doj','$gen',' ','  ',' ')";

        if(mysqli_query($conn, $sql)){
          //echo "<h3>data stored in a database successfully.";
          header("location: Expansion_panel.php");
        } else{
          echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
        }
    /*// Checking for the errors
    if (count($errors) == 0) {
        // Password matching
        //$passworee = md5($passwor);
        //$query ="SELECT E_id, Password FROM users_data WHERE E_id='$usernam' AND Password='$passworee'";
        $query="INSERT INTO attendence (Date,E_id,M_id,Name,Punch_in,Status)
          VALUES (DATE(NOW()),'$ud','$Mid','$name',Time(NOW()),'$Satatus')";
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
    }*/
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>

    <style>
    .collapsible {
        /*background-color: #777;*/
        background-color: #ffffff;
        border-color: #e7eaec;
        border-style: solid solid none;
        border-width: 0px 0 0;
        color: inherit;
        /*color: white;*/
        cursor: pointer;
        padding: 10px;
        width: 100%;
        /*border: none;*/
        text-align: left;
        outline: none;
        font-size: 15px;
        border-top: 3px solid #2698d4

    }

    .active,
    .collapsible:hover {
        /*background-color: #555;*/
        background-color: #ffffff;
    }

    .collapsible:after {
        content: '\002B';
        color: grey;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2212";
    }

    .content {
        padding: 0 18px;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
        /*background-color: #f1f1f1;*/
        background-color: #ffffff;
    }

    /* #wrapper {
    position: absolute;
    top: 0px;
    left: 0px;
    width: inherit;
    height: inherit;
    cursor: default;
    z-index: 100;
    border-radius: 0px;
}*/
    </style>
</head>

<body style="background: #f1f1f1;">

    <form class="row g-3 needs-validation" novalidate method="POST">
    <div style=" background-color: white;">
        <input type="image" src="../assests/images/profile-icon.png"
            style="height:120px; width:120px;  margin-left: 15px;  margin-top: 15px;  margin-bottom: 5px;" />
        <br>
    </div>
    <br>
    <button class="collapsible" style="color:grey; font-weight: bold; border-bottom: 1px solid grey;"><input
            type="image" src="../assests/images/profile-icon.png" style="height:20px; width:20px;" />Basic Information</button>
    <div class="content">
            <div class="row g-3 needs-validation" novalidate>
            <div class="col-md-3">
                <br>
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" name="fname" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <label for="validationCustom02" class="form-label">Last name</label>
                <input type="text" name="lname" class="form-control" id="validationCustom02" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-2">
                <br>
                <label for="validationCustomUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" name="uname" class="form-control" id="validationCustomUsername"
                        aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <label for="validationCustom03" class="form-label">City</label>
                <input type="text" class="form-control" name="ccity" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">State</label>
                <input type="text" class="form-control" name="sstate" id="validationCustom03" required>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-md-1">
                <label for="validationCustom05" class="form-label">Zip</label>
                <input type="text" name="zzip" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>


            <div class="col-md-3">
                <label for="validationCustom01" class="form-label">Father Name</label>
                <input type="text" name="fnname" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom01" class="form-label">Mother Name</label>
                <input type="text" name="mnname" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom01" class="form-label">Mentor Name</label>
                <input type="text" name="mtname" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Email Address</label>
                <input type="email" name="email1" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-2">
                <label for="validationCustom01" class="form-label">Employee Id</label>
                <input type="number" name="eid" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom01" class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-3">
                <label for="validationCustom01" class="form-label">Date of Joining</label>
                <input type="date" name="doj" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-2">
                <label for="validationCustom01" class="form-label">Manager Id</label>
                <input type="number" name="mid" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-1">
                <label for="validationCustom01" class="form-label">Gender</label>
                <select class="form-select" name="gen" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>

                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

</div>

    </div>
    <br>


    <button class="collapsible" style="color:grey; font-weight: bold; border-bottom: 1px solid grey;"><input
            type="image" src="../assests/images/profile-icon.png" style="height:20px; width:20px;" />Position Details</button>
    <div class="content">
        <!--<form class="row g-3 needs-validation" novalidate>-->
        <div class="row g-3 needs-validation" novalidate>
            <div class="col-md-3">
                <br>
                <label for="validationCustom01" class="form-label">Sub Company</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <label for="validationCustom01" class="form-label">Department</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <label for="validationCustom01" class="form-label">Sub Department</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <label for="validationCustom01" class="form-label">Designation</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <label for="validationCustom01" class="form-label">Branch</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <label for="validationCustom01" class="form-label">Sub Branch</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <label for="validationCustom01" class="form-label">Grade</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <label for="validationCustom01" class="form-label">Level</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <label for="validationCustom01" class="form-label">Reporting Manager</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <label for="validationCustom01" class="form-label">HR Buddy</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <label for="validationCustom01" class="form-label">Functional Manager</label>
                <input type="text" class="form-control" id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <br>
            </div>
        </div>

    </div>
    <br>

    <button class="collapsible" class="collapsible"
        style="color:grey; font-weight: bold; border-bottom: 1px solid grey;"><input type="image" src="../assests/images/profile-icon.png"
            style="height:20px; width:20px;" />Personal Details</button>
    <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat.</p>
    </div>
    <br>

    <button class="collapsible" class="collapsible"
        style="color:grey; font-weight: bold; border-bottom: 1px solid grey;"><input type="image" src="../assests/images/profile-icon.png"
            style="height:20px; width:20px;" />Children Information</button>
    <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat.</p>
    </div>
    <br>
    <button class="collapsible" class="collapsible"
        style="color:grey; font-weight: bold; border-bottom: 1px solid grey;"><input type="image" src="../assests/images/profile-icon.png"
            style="height:20px; width:20px;" />Qualification</button>
    <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat.</p>
    </div>
    <br>
    <button class="collapsible" class="collapsible"
        style="color:grey; font-weight: bold; border-bottom: 1px solid grey;"><input type="image" src="../assests/images/profile-icon.png"
            style="height:20px; width:20px;" />Work Experience</button>
    <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat.</p>
    </div>
    <br>
    <button class="collapsible" class="collapsible"
        style="color:grey; font-weight: bold; border-bottom: 1px solid grey;"><input type="image" src="../assests/images/profile-icon.png"
            style="height:20px; width:20px;" />Health Insurance Information</button>
    <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat.</p>
    </div>
    <br>
    <div style=" background-color: white;">
    <br>
    <label>Remark:</label>
    <input type="text"  required>
                <br>
    </div>
<br>
    <div class="col-12">
                <button class="btn btn-primary" type="submit" name="submit" style="float: right; margin-right: 50px;">Submit form</button>
            </div>
            </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>

    <script src="../assests/js/signup.js"></script>

    <script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }
    </script>

</body>

</html>


<!-- Signup Button code end -->


</div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>


   



    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
</body>

</html>