<?php
$servername='localhost';
$username='test';
$password='Test123$';
$dbname='myusers';
$con = new mysqli($servername,$username,$password,$dbname);

if($con->connect_error){
  echo "connection error: ".$con->connect_error;
}

$sql = "SELECT * FROM EMPLOYEE";
$result = $con->query($sql);

echo "<table style='width:100%'' border='1' >
<tr>
<td align=center> <b>Name</b></td>
<td align=center><b>E-mail</b></td>
<td align=center><b>Position</b></td>
<td align=center><b>Phone Number</b></td></td>
<td align=center><b>Salary</b></td>
<td align=center><b>Date Hired</b></td>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["email"]."</td><td>" . $row["position"]. "</td><td>" . $row["phone"]."</td><td>" . $row["salary"]."</td><td>" . $row["date"]. "</td>";
    }
} else {
    echo "0 results";
}
echo "</tr></table>";
$con->close();
?>
