<?php
$servername='localhost';
$username='test';
$password='Test123$';
$dbname='myusers';
$con = new mysqli($servername,$username,$password,$dbname);

if($con->connect_error){
  echo "connection error: ".$con->connect_error;
}

$sql="INSERT INTO EMPLOYEE(name,email,position,phone,salary,date)
VALUES('$_POST[name]','$_POST[email]','$_POST[position]','$_POST[phone]','$_POST[salary]','$_POST[date]')";

if ($con->query($sql) === TRUE) {
    include 'index.html';
    echo "<script>alert('A new record was added succesfully.')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();
?>
