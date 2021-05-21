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
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Approvel</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="admin_Leave1.php" style="color:white;">Leave</a>
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
            </ul>

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
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><div class="user1" style="background-image:url('../assests/images/sound-bell.png')"></div></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><div class="user1" style="background-image:url('../assests/images/profile-icon.png')"></div></a>
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


            <div style="background-color: white">

<h3 style="color:blue;">&nbsp;&nbsp;<b>Leave<b></b></h3><br>
<p>&nbsp;&nbsp;&nbsp;Self Service/&nbsp;Request/&nbsp;Leave</p>

</div>





<!-- Leave file -->
<?php
session_start();
if(isset($_SESSION['id'])){
    //echo "Welcome". $_SESSION['id'];
    $id=$_SESSION['id'];
   // echo "<br>";

    include('database.php');
    if (isset($_POST['submit'])) {
        $sql1 = "SELECT First_Name, Last_Name, Username FROM users_data WHERE E_id='$id'";
        $results = $conn->query($sql1);
        if ($results->num_rows > 0) {
            // output data of each row
            $row = $results->fetch_assoc();
            // Data sanitization to prevent SQL injection
            $Leavet = $_POST["Leavet"];
            $StartingD = $_POST["StartingD"];
            $EndingD = $_POST["EndingD"];
            $Reason = $_POST["Reason"];
            $name=$row["First_Name"]." ".$row["Last_Name"];
            // Error message if the input field is left blank
            if (empty($usernam)) {
                array_push($errors, "Username is required");
            }
            if (empty($passwor)) {
                array_push($errors, "Password is required");
            }
            $sql = "INSERT INTO LeaveTable (E_id,Name,Start_Date,End_Date,Leave_Type,Remarks,Status)
                VALUES ('$id','$name','$StartingD','$EndingD','$Leavet',' $Reason',' ')";
            if(mysqli_query($conn, $sql)){
               // echo "<h3>data stored in a database successfully.";
            } else{
                echo "ERROR: Hush! Sorry $sql. "
                  . mysqli_error($conn);
            }
            $conn->close();

        } else {
             // echo "0 results";
        }

    }
}else{
    echo "Please login to continue";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <title>Leave Page</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--<script>
    $(function() {
        var from = $("#fromDate")
            .datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true
            })
            .on("change", function() {
                to.datepicker("option", "minDate", getDate(this));
            }),
            to = $("#toDate").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true
            })
            .on("change", function() {
                from.datepicker("option", "maxDate", getDate(this));
            });

        function getDate(element) {
            var date;
            var dateFormat = "yy-mm-dd";
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }

            return date;
        }
    });
    </script>-->
</head>

<body style="background: #f1f1f1;">
    <div class="p-3 mb-2 bg-white text-dark">
        <h3>Leave Application Form</h3>
        <br>
        <form class="row g-3 needs-validation" method="POST">
            <div class="row g-3">
                <label for="validationCustom04" class="col-sm-1 col-form-label">Leave Type</label>
                <div class="col-sm-4">
                    <select class="form-select" id="validationCustom04" name="Leavet"
                        style="border-left: 2px solid #bb0000;" required>
                        <option selected disabled="">Select Leave</option>
                        <option>Birthday Leave</option>
                        <option>Leave Without Pay</option>
                        <option>Normal Leave</option>
                        <option>Vacation Leave</option>
                    </select>
                </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="col-md-4">
                    <!--<label for="validationCustom01" class="col-sm-4 col-form-label">Date</label>-->
                    <p>Date: <input type="date" id="fromDate" name="StartingD" style="border-right: 1px solid #e5e6e7;
    border-top: 1px solid #e5e6e7;
    border-bottom: 1px solid #e5e6e7;
    border-left: 2px solid #bb0000" required>to<input type="date" id="toDate" name="EndingD" style="border-right: 1px solid #e5e6e7;
    border-top: 1px solid #e5e6e7;
    border-bottom: 1px solid #e5e6e7;
    border-left: 2px solid #bb0000" required></p>

                    <!-- <input type="text" class="col-sm-3 col-form-label" id="validationCustom04" id="fromDate"
                        style="border-left: 2px solid #bb0000;" name="StartingD" required>
                    <span class="input-group-addon">to</span>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                    <input type="text" class="col-sm-3 col-form-label" id="validationCustom01" id="toDate"
                        style="border-left: 2px solid #bb0000;" name="EndingD" required>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>-->

                </div>
            </div>
            <br><br><br><br>
            <div class="row mb-4">
                <label for="inputEmail3" class="col-sm-1 col-form-label">Reason</label>
                <div class="col-sm-10">

                    <textarea class="form-control mdt_feild required" cols="20" id="txtReason" maxlength="200"
                        name="Reason" placeholder="Reason (max 200 characters)" rows="2"
                        style="margin: 0px -60.375px 0px 0px; width: 1114px; height: 110px; border-left: 2px solid #bb0000;"></textarea>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
            </div>
    </div>
    <button type="submit" class="btn btn-warning" style="float: right; margin-right: 50px;"
        name="submit">Submit</button>
    </form>

    <br>

    <script src="../assests/js/signup.js"></script>
</body>

</html>

<!-- Leave file  Ending-->


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