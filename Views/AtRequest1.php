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
            <div style="background-color: white">

                <h3 style="color:blue;">&nbsp;&nbsp;<b>Attendance<b></b></h3><br>
                <p>&nbsp;&nbsp;&nbsp;Self Service/Approvel/Attendance</p>

            </div>


            <a href="admin_attendence1.php">Attendance</a>&nbsp;  &nbsp;
            <a href="AtRequest1.php">Attendance Correction</a>
<hr>


<!-- Attendanve Request-->
<?php
session_start();

if(isset($_SESSION['id'])){
  //echo "Welcome". $_SESSION['id'];
  $id=$_SESSION['id'];
  //echo "<br>";
  require 'database.php';


  $sql1 = "SELECT First_Name, Last_Name, Username,E_id FROM users_data WHERE M_id='$id'";
    $resultsss = $conn->query($sql1);
    //echo"hi";
    //echo "Returned rows are: " . $resultsss -> num_rows;
    if ($resultsss->num_rows > 0) {
        // output data of each row
      $row = $resultsss->fetch_assoc();
      $today =date("Y-M-d");
      $Eid=$row["E_id"];
      echo "$Eid";
      $name=$row["First_Name"]." ".$row["Last_Name"];
      $Satatus="Pending";
//echo "hi";
    $limit = 10;
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
        }
        else{
        $page=1;
        };
    $start_from = ($page-1) * $limit;
 //echo "hi";
   //$result=mysqli_query($conn, SELECT attendence.Date,attendence.Name,attendence.Punch_in,attendence.Pinch_out,attendence.status users_datas.E_id FROM Orders INNER JOIN attendence ON attendence.E_id = users_datas.M_idLIMIT $start_from, $limit");
   //$result = mysqli_query($conn,"SELECT First_Name, Last_Name,E_id FROM users_data WHERE M_id='$id' LIMIT $start_from, $limit");
   //$results = $conn->query($sql1);
   //$name=$row["First_Name"]." ".$row["Last_Name"];

   //echo $name;
   //echo "Returned rows are: " . $result -> num_rows;
   //$sql1 = "SELECT First_Name, Last_Name,E_id FROM users_data WHERE M_id='$id";
   //$results = $conn->query($sql1);
   //echo "Returned rows are: " . $results -> num_rows;
   //echo "hi";
   //if ($results->num_rows > 0) {
     //echo "hi";
   //$Eid=$row["E_id"];
   //$name=$row["First_Name"]." ".$row["Last_Name"];
   //$Satatus="Approved";
     $result = mysqli_query($conn,"SELECT * FROM AtRequest WHERE E_id='$Eid' LIMIT $start_from, $limit");
    // if (isset($_POST['button1']))  {
    //     $sql11 = "UPDATE LeaveTable SET Status='$Satatus' WHERE E_id='$Eid'";
    //       if(mysqli_query($conn, $sql11)){
    //         //echo "<h3>data stored in a database successfully.";
    //       } else{
    //         echo "ERROR: Hush! Sorry $sql11. "
    //           . mysqli_error($conn);
    //       }
    // }else if(isset($_POST['button2'])){
    //     $sql11 = "UPDATE LeaveTable SET Status='Rejected' WHERE E_id='$Eid'";
    //       if(mysqli_query($conn, $sql11)){
    //         //echo "<h3>data stored in a database successfully.";
    //       } else{
    //         echo "ERROR: Hush! Sorry $sql11. "
    //           . mysqli_error($conn);
    //       }
    //   }
  }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Leave</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
			function refreshPage(){
				if(confirm("Are you sure, want to refresh?")){
					location.reload();
				}
			}
		</script>
</head>
<body>
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Check</th>
<th>Employ id</th>
<th>Name</th>
<th>Date</th>
 <th>Start Date</th>
 <th>Punch Time</th>
<th>End Date</th>
<th>punch Time</th>
<th>Reason</th>
<th>Remark</th>
<th>Status</th>
</tr>
<thead>
<tbody>
<?php
while ($row = mysqli_fetch_array($result)) {
?><?php echo $row["Rid"]; ?>
            <tr>
            <td><input class="select-item" type="checkbox" id="<?php echo $row["Rid"]; ?>"></td>
				<td><?php echo $row["E_id"]; ?></td>
				<td><?php echo $row["Name"]; ?></td>
                <td><?php echo $row["Date"]; ?></td>
				<td><?php echo $row["IDate"]; ?></td>
                <td><?php echo $row["Punch_in"]; ?></td>
				<td><?php echo $row["ODate"]; ?></td>
                <td><?php echo $row["Pinch_out"]; ?></td>
				<td><?php echo $row["Reason"]; ?></td>
        <td><?php echo $row["Remark"]; ?></td>
        <td><?php echo $row["Status"]; ?></td>
            </tr>
<?php
};
?>
</tbody>
</table>
<?php
$sql1 = "SELECT * FROM AtRequest";
if ($result=mysqli_query($conn,$sql1))
{
  // Return the number of rows in result set
      $rowcount=mysqli_num_rows($result);
       //printf("Result set has %d rows.\n",$rowcount);
      $a=$rowcount/10;
      ceil($a);
      $pagLink = "<ul class='pagination'>";
      for($b=1;$b<=$a;$b++)
      {
        $pagLink .= "<li class='page-item'><a class='page-link' href='AtRequest1.php?page=".$b."'>".$b."</a></li>";

      }
      echo $pagLink . "</ul>";
   // Free result set
       mysqli_free_result($result);
 }
 mysqli_close($conn);

 /*
$result = mysql_query("SELECT * FROM statement");
$rows = mysql_num_rows($result);
echo "There are " . $rows . " rows in my table.";
/*
$result_db = mysqli_query($conn,"SELECT COUNT(COL 1) FROM statement");

echo "Hi";
$row_db = mysqli_fetch_row($result_db);
$total_records = $row_db[0];
echo "$total_records";
echo "Hi";
$total_pages = ceil($total_records / $limit);
/* echo  $total_pages;
$pagLink = "<ul class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link' href='Pagging.php?page=".$i."'>".$i."</a></li>";
}
echo $pagLink . "</ul>";*/
?>
<button onclick="accept()">Accept</button>
<button onclick="reject()">Reject</button>
<script>
 function accept() {
        const selectedItems = document.querySelectorAll('.select-item');
        let array = [];
        for (let i = 0; i < selectedItems.length; i++) {
            if (selectedItems[i].checked) array.push(selectedItems[i].id);
        }
        //console.log(array);
        xmlhttp = new XMLHttpRequest;
        xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("txtHint").innerHTML = this.responseText);
      }
    };

        xmlhttp.open("POST","accept2.php");
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("array="+array);
    }
    function reject() {
        const selectedItems = document.querySelectorAll('.select-item');
        let array = [];
        for (let i = 0; i < selectedItems.length; i++) {
            if (selectedItems[i].checked) array.push(selectedItems[i].id);
        }
        //console.log(array);
        xmlhttp = new XMLHttpRequest;
        xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("txtHint").innerHTML = this.responseText);
      }
    };

        xmlhttp.open("POST","reject2.php");
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("array="+array);
    }

</script>
<!--<script>
    const reloadtButton = document.querySelector("#reload");
// Reload everything:
function reload() {
    reload = location.reload();
}
// Event listeners for reload
reloadButton.addEventListener("click", reload, false);
</script>-->

</body>
</html>


<!-- Attendence Request-->



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


    <script>
    function MarkAttendence() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("demo").innerHTML =this.responseText;
                console.log(this.responseText);
            }
        };
        xhttp.open("GET", "attendence1.php", true);
        xhttp.send();
    }


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