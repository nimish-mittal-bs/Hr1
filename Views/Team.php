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

<h3 style="color:blue;">&nbsp;&nbsp;<b>Team<b></b></h3><br>
<p>&nbsp;&nbsp;&nbsp;Self Service/&nbsp;Team</p>

</div>





<!-- Team Code -->
<?php
session_start();

if(isset($_SESSION['id'])){
  //echo "Welcome". $_SESSION['id'];
  $id=$_SESSION['id'];
  //echo "<br>";
  require 'database.php';
  $sqlls = "SELECT M_id FROM users_data WHERE E_id='$id'";
      $results = $conn->query($sqlls);
      //echo "$results->num_rows";
      $row = $results->fetch_assoc();
      $mentor=$row["M_id"];
      //echo $mentor;
      //echo "Returned rows are: " . $results -> num_rows;
      //echo "Hi";

    $limit = 10;
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
        }
        else{
        $page=1;
        };
    $start_from = ($page-1) * $limit;

    $result = mysqli_query($conn,"SELECT * FROM users_data WHERE M_id='$mentor' LIMIT $start_from, $limit");
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
<th>Employ id</th>
<th>Name</th>
 <th>Role</th>

</tr>
<thead>
<tbody>
<?php
while ($row = mysqli_fetch_array($result)) {
?>
            <tr>
				<td><?php echo $row["E_id"]; ?></td>
				<td><?php echo $row["First_Name"]." ".$row["Last_Name"]; ?></td>
				<td><?php echo $row["Role"]; ?></td>

            </tr>
<?php
};
?>
</tbody>
</table>
<?php
$sql1 = "SELECT * FROM users_data";
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
        $pagLink .= "<li class='page-item'><a class='page-link' href='Pagging.php?page=".$b."'>".$b."</a></li>";

      }
      echo $pagLink . "</ul>";
   // Free result set
       mysqli_free_result($result);
 }
 mysqli_close($conn);


?>


</body>
</html>


<!-- Team Code End -->



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