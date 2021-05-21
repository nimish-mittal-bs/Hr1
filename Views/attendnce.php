<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance</title>
</head>

<body>


<button  name="submit" onclick="MarkAttendence()" onclick='window.location.href=window.location.href'>Mark Attendance</button>


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

</body>

</html>