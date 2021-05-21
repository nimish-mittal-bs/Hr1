


<!-- Profile Code-->
<?php
session_start();

if(isset($_SESSION['id'])){
  //echo "Welcome". $_SESSION['id'];
  $id=$_SESSION['id'];
  echo "<br>";
  require 'database.php';
  $sqlls = "SELECT First_Name,Last_Name,Email,D_O_B,D_O_J,Role FROM users_data WHERE E_id='$id'";
      $results = $conn->query($sqlls);
      //echo "$results->num_rows";
      $row = $results->fetch_assoc();
      $name=$row["First_Name"]." ".$row["Last_Name"];
      $email1=$row["Email"];
      $dob=$row["D_O_B"];
      $doj=$row["D_O_J"];
      $role=$row["Role"];
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<h2 style="text-align:center">User Profile Card</h2>

<div class="card">
  <img src="../assests/images/profile-image1.png" alt="John" style="width:100%">
  <h1><?php echo "$name" ?> </h1>
  <p class="title"><?php echo "$role" ?></p>
  <h4>Bigstep Technology</h4>
  <p><?php echo "$email1" ?></p>
  <p><b>D.O.B:-</b><?php echo "$dob" ?></p>
  <p><b>D.O.J:-</b><?php echo "$doj" ?></p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-facebook"></i></a>
  </div>
  <p><button>Contact</button></p>
</div>

</body>
</html>

<!-- Profile Code End -->