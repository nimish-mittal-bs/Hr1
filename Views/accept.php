<?php
include("database.php");
$array=$_POST['array'];
$qw=explode(",",$array);

//$result = mysqli_query($conn,"SELECT * FROM attendence WHERE M_id='$id' LIMIT $start_from, $limit");
    //if (isset($_POST['button1']))  {
foreach($qw as $a){
        $sql11 = "UPDATE attendence SET Status='Accept' WHERE Aid='$a' ";
          if(mysqli_query($conn, $sql11)){
            echo "<h3>data stored in a database successfully.";
          } else{
            echo "ERROR: Hush! Sorry $sql11. "
              . mysqli_error($conn);
          }
        }

//     //}else if(isset($_POST['button2'])){
//         $sql11 = "UPDATE attendence SET Status='Rejected' WHERE M_id='$id'";
//           if(mysqli_query($conn, $sql11)){
//             echo "<h3>data stored in a database successfully.";
//           } else{
//             echo "ERROR: Hush! Sorry $sql11. "
//               . mysqli_error($conn);
//           }
//     }
// }
?>