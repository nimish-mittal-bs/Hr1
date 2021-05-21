<?php
session_start();
if(isset($_SESSION['id'])){
    //echo "Welcome". $_SESSION['id'];
    $id=$_SESSION['id'];
    //echo "<br>";

    include('database.php');
    //if (isset($_POST['submit'])) {
        //echo "12345";
    $sql = "SELECT First_Name, Last_Name, Username,M_id FROM users_data WHERE E_id='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
      $row = $result->fetch_assoc();
      $today =date("Y-M-d");
      echo "$today";
      $currentTime =date("H:i:s a");
      $ud=$_SESSION['id'];
      $Mid=$row["M_id"];
      $name=$row["First_Name"]." ".$row["Last_Name"];
      $Satatus="Pending"  ;
      $sqlls = "SELECT Date, E_id, Punch_in, Pinch_out FROM attendence WHERE Date=DATE(NOW()) And E_id='$id'";
      $results = $conn->query($sqlls);
      //echo "$results->num_rows";
      echo "Returned rows are: " . $results -> num_rows;
      echo "Hi";

      if ($results->num_rows > 0) {
        //$a=DATE(NOW());
        //echo "$a";
        if(($row["Pinch_out"]===NULL))  {
          //echo "HIiiii";
          try{
            $conn->begin_transaction();

          $sql1 = "UPDATE attendence SET Pinch_out=Time(NOW()) WHERE E_id='$id' AND Date=Date(NOW())";
          if(mysqli_query($conn, $sql1)){
            echo "<h3>data stored in a database successfully.";
          } else{
            echo "ERROR: Hush! Sorry $sql1. "
              . mysqli_error($conn);
          }$conn->commit();
        }catch(\Throwable $e){
          $conn->rollback();
          throw $e;
        }
        }else{
          echo "Same Punch out time";
        }
      }else{
        $sql = "INSERT INTO attendence (Date,E_id,M_id,Name,Punch_in,Status)
          VALUES (DATE(NOW()),'$ud','$Mid','$name',Time(NOW()),'$Satatus')";

        if(mysqli_query($conn, $sql)){
          echo "<h3>data stored in a database successfully.";
        } else{
          echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
        }
        $conn->close();
      }
    } else {
        echo "0 results";
    }
    //}
}
else{
    echo "Please login to continue";
}
?>