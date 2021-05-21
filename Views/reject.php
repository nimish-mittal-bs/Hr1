<?php
include("database.php");
$array=$_POST['array'];
$qw=explode(",",$array);
foreach($qw as $a){
$sql11 = "UPDATE attendence SET Status='Rejected' WHERE Aid='$a'";
          if(mysqli_query($conn, $sql11)){
            echo "<h3>data stored in a database successfully.";
          } else{
            echo "ERROR: Hush! Sorry $sql11. "
              . mysqli_error($conn);
          }
        }
?>